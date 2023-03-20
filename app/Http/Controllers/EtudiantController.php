<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */



  public function index(Request $request)
  {
    $etudiants = Etudiant::with('user')->paginate(20);

    $iconHtml = '<i class="fa-solid fa-xmark text-danger"></i>';

    $currentPageItems = $etudiants->items();

    $pagination = $etudiants->appends($request->query());

    return view('etudiant.index', [
      'etudiants' => $etudiants,
      'icon' => $iconHtml,
      'items' => $currentPageItems,
      'pagination' => $pagination
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\BlogPost  $blogPost
   * @return \Illuminate\Http\Response
   */
  public function show(Etudiant $etudiant)
  {
    $etudiant = Etudiant::with('ville', 'user')
      ->findOrFail($etudiant->user_id);
    return view('etudiant.show', [
      'etudiant' => $etudiant,
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
    $etudiant = Etudiant::with('ville', 'user')
      ->findOrFail($etudiant['user_id']);
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
    $etudiant->user()->update([
      'email' => $request->email
    ]);
    $etudiant->update([
      'nom' => $request->nom,
      'ville_id' => $request->ville_id,
      'adresse' => $request->adresse,
      'date_naissance' => $request->date_naissance,
      'phone' => $request->phone
    ]);

    return redirect(route('etudiant.show', $etudiant->user_id))->withSuccess('Mise à jour réussite');
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