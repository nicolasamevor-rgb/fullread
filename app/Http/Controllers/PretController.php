<?php

namespace App\Http\Controllers;

use App\Models\ExemplaireLivre;
use App\Models\Livre;
use App\Models\Pret;
use App\Http\Requests\StorePretRequest;
use App\Http\Requests\UpdatePretRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprunts = Pret::all();
        $reservation = Reservation::all();
        $livre = Livre::all();
        $user = Auth::user();
        return view('Eleve.emprunts', compact('user', 'reservation', 'livre', 'emprunts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Reservation $reservation)
    {
        // dd($request->all());
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            // 'exemplaire_id' => 'required|exists:exemplaire_livres,id',


        ]);
        $pret = Pret::create([
            'reservation_id' => $request->reservation_id,
            'date_retour_prevue' => $request->date_retour_prevue,
            'exemplaire_id' => $request->exemplaire_id,
            // 'date_retour_effective' => $request->date_retour_effective,
        ]);
        Reservation::where('id', $request->reservation_id)
            ->update(['status' => 'expirée']);
        ExemplaireLivre::where('id', $request->exemplaire_id)
            ->update(['disponibilite' => 0]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePretRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pret $pret)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pret $pret)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePretRequest $request, Pret $pret)
    {


        $pret->update($request->validated());
        $pret->exemplaire->update(['disponibilite' => 1]);


        return redirect(route('emprunts', $pret));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pret $pret)
    {
        //
    }
    public function filter()
    {
        $user = Auth::user();
        $emprunts = Pret::whereHas('reservation', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('reservation')->get();

        return view('Eleve.ownemprunts', compact('emprunts'));
    }
    public function showaddEmpruntForm(Livre $livre, $id)
    {
        $exemplaires = ExemplaireLivre::where('livre_id', $livre->id)
            ->where('disponibilite', 1)
            ->get();
        $reservation = Reservation::find($id);
        return view('form.addEmprunt', compact('exemplaires', 'reservation'));
    }
    public function showdateretourform(Pret $pret)
    {
        return view('form.dateretour', compact('pret'));
    }
}
