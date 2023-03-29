<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function login()
  {
    return view('auth.login');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function create()
  {
    return view('auth.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|email|unique:users',
      'password' => 'min:6'
    ]);

    $user = new User;
    $user->fill($request->all());
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->back()->withSuccess(trans('lang.success'));
  }

  public function userList()
  {
    $users = user::select('id', 'name', 'email')->paginate(5);
    return view('auth.user-list', ['users' => $users]);
  }

  public function authentication(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      return redirect()->intended(route('welcome'));
    }

    return redirect()->back()->withErrors(trans('auth.password'))->withInput();

    // if (!Auth::validate($credentials)):
    //   return redirect()->back()->withErrors(trans('auth.password'))->withInput();
    // endif;

    // $user = Auth::getProvider()->retrieveByCredentials($credentials);

    // Auth::login($user);

    // return redirect()->intended(route('welcome'));
  }

  public function logout()
  {
    Auth::logout();
    return redirect(route('login'));
  }

}