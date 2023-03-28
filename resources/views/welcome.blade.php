@extends('layouts.app')
@section('title', trans('lang.home'))
@section('content')
  <div class="container">
    @if (session('success'))
      <div class="card-header">
        <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif


    <div class="col-12 text-center pt-5 text-light">
      <div class="display-5 mt-2">@lang('lang.welcome')!</div>
    </div>
  </div>
@endsection
