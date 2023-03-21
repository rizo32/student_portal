<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $villes = Ville::select()->get();
    return view('user.create', ['villes' => $villes]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    // si la création d'étudiant échoue, je veux qu'user soit rollback, et vice-versa
    DB::beginTransaction();

    try {

      $user = User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);
      
      $etudiant = Etudiant::with('user')->create([
        'user_id' => $user['id'],
        'nom' => $request->nom,
        'ville_id' => $request->ville_id,
        'adresse' => $request->adresse,
        'date_naissance' => $request->date_naissance,
        'phone' => $request->phone
      ]);
      DB::commit(); // ça marche!
    } catch (\Exception $e) {
      DB::rollback(); // Abort! Abort!
      throw $e;
    }

    return redirect(route('etudiant.show', $etudiant->user_id));
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
