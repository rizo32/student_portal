<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
class EtudiantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $etudiants = Etudiant::select()
    
    ->paginate(20);

    // Define the icon HTML
    $iconHtml = '<i class="fa-solid fa-xmark text-danger"></i>';

    return view('etudiant.index', compact('etudiants'), ['etudiants' => $etudiants, 'icon' => $iconHtml]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $villes = Ville::select()->get();
    return view('etudiant.create', ['villes' => $villes]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $etudiant = Etudiant::create([
      'nom' => $request->nom,
      'email' => $request->email,
      'ville_id' => $request->ville_id,
      'adresse' => $request->adresse,
      'date_naissance' => $request->date_naissance,
      'phone' => $request->phone
    ]);

    // On évite d'y aller par dossier 'redirect('/blog/blog...') parce que Laravel fonctionne plus par route
    return redirect(route('etudiant.show', $etudiant->id));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\BlogPost  $blogPost
   * @return \Illuminate\Http\Response
   */
  public function show(Etudiant $etudiant) {
    $etudiant = Etudiant::select('etudiants.nom as etudiant_nom', 'villes.nom as ville_nom', 'etudiants.id', 'adresse', 'phone', 'email', 'date_naissance')
      ->leftJoin('villes', 'etudiants.ville_id', '=', 'villes.id')
      ->where('etudiants.id', $etudiant->id)
      ->get();
    // return $etudiant;
    return view('etudiant.show', [
      'etudiant' => $etudiant[0]
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\BlogPost  $blogPost
   * @return \Illuminate\Http\Response
   */
  public function edit(Etudiant $etudiant)
  {
    $villes = Ville::select()->get();
    return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\BlogPost  $blogPost
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Etudiant $etudiant)
  {
    $etudiant->update([
      'nom' => $request->nom,
      'email' => $request->email,
      'ville_id' => $request->ville_id,
      'adresse' => $request->adresse,
      'date_naissance' => $request->date_naissance,
      'phone' => $request->phone
    ]);

    return redirect(route('etudiant.show', $etudiant->id))->withSuccess('Mise à jour réussite');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\BlogPost  $blogPost
   * @return \Illuminate\Http\Response
   */
  public function destroy(Etudiant $etudiant)
  {
    $etudiant->delete();

    return redirect(route('etudiant.index'));
  }




}