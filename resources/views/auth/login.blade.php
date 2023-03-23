@extends('layouts.app')
@section('title', @lang('lang.login'))
@section('header', 'Login')
@section('content')

  <div class="col-md-8">
    <form method="POST">
      {{-- <form action="{{ route('etudiant.auth', $user->id) }}" method="POST"> --}}
      @csrf
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (!$errors->isEmpty())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            {{ $error }}<br>
          @endforeach
        </div>
      @endif

      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.provide_infos')
      </div>

      <div class="control-grup col-12">
        <label for="email">@lang('lang.email')</label>
        <input type="text" id="email" placeholder="johndoe@caramail.com" name="email" class="form-control"
          value="{{ old('email') }}" />
      </div>

      <div class="control-grup col-12">
        <label for="password">@lang('lang.password')</label>
        <input type="password" id="password" placeholder="mypassword" name="password" class="form-control" />
      </div>
      <input class="form-control mt-3" type="submit" value=@lang('lang.login') />
    </form>
  </div>

@endsection
