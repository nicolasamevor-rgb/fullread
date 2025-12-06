<?php

namespace App\Http\Controllers;

use App\Models\ExemplaireLivre;
use App\Models\Livre;
use Illuminate\Http\Request;

class ExemplaireLivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $exemplaire = ExemplaireLivre::create([
            'livre_id' => $request->livre_id,
        ]);
        return redirect()->back()->with('success', "L'exemplaire du livre a été ajouté avec succès");
    }

    public function showaddform()
    {
        $livres = Livre::all();
        return view('form.ajoutexemplairelivre', compact('livres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
