<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Livre;
use App\Http\Requests\StoreLivreRequest;
use App\Http\Requests\UpdateLivreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = $livres = Livre::withCount([
            'exemplaireLivre as exemplaire_livre_count' => function ($query) {
                $query->where('disponibilite', 1);
            }
        ])->get();

        $categories = categorie::all();
        return view('Eleve.catalogue', ['livres' => $livres, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:150|unique:livres',
            'auteur' => 'required|string|max:100|',
        ]);
        $livre = Livre::create([
            'titre' => $request->titre,
            'auteur' => $request->auteur,
            'disponibilite' => $request->disponibilite,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->back()->with('success', 'Le livre a été ajouté avec succès');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivreRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivreRequest $request, Livre $livre)
    {
        // dd($request->validated());
        $livre->update($request->validated());
        return redirect(route('catalogue', $livre));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        //
    }
    public function showupdateform(Livre $livre)
    {
        $categories = categorie::all();
        return view('form.updatelivre', compact('livre', 'categories'));
    }
    public function gohome()
    {
        $livres = Livre::all();
        return view('home', compact('livres'));
    }

}
