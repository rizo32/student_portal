<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\User;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function create()
  {
    $cities = City::all();
    $view = view('user.create', compact('cities'));
    return $view;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  // J'utilise un ensemble de règle de validation dans http/Requests
  public function store(CreateStudentRequest $request)
  {
    // ensures that all operations are either committed or rolled back as a single unit of work
    return DB::transaction(function () use ($request) {

      $user = User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);

      $user->student()->create([
        'name' => $request->name,
        'city_id' => $request->city_id,
        'address' => $request->address,
        'birthday' => $request->birthday,
        'phone' => $request->phone
      ]);

      // login automatique lors de l'inscription
      Auth::login($user);

      return redirect(route('welcome'))->withSuccess(
        trans('lang.success')
      );
    });
  }
}