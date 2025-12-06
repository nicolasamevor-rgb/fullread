<?php

namespace App\Console\Commands;

use App\Models\Pret;
use App\Models\Sanction;
use Illuminate\Console\Command;

class SanctionCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sanction-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Pret $pret)
    {
        $prets = Pret::all();
        $count = 0;

        foreach ($prets as $pret) {
            $drp = $pret->date_retour_prevue;

            if ($drp && now()->gt($drp)) {
                $joursRetard = $drp->diffInDays(now());
                $amende = $joursRetard * 50;

                Sanction::updateOrCreate(
                    [
                        'pret_id' => $pret->id,
                        'motif' => 'Retard de retour du livre',
                    ],
                    [
                        'amende' => $amende,
                    ]
                );


                $count++;
            }
        }

        if ($count > 0) {
            $this->info("✅ $count sanction(s) générée(s).");
        } else {
            $this->info("Aucun prêt en retard détecté.");
        }
    }

}
