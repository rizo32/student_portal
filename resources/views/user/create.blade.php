@extends('layouts.app')
@section('title', 'Create')
@section('header', 'Admission')
@section('content')

  <div class="col-md-8">
    <form action="{{ route('user.store') }}" method="post">
      @csrf
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.provide_infos')
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="nom">@lang('lang.name')</label>
          <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="nom">@lang('lang.address')</label>
          <input type="text" id="adresse" name="adresse" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="phone">@lang('lang.phone')</label>
          <input type="text" id="phone" name="phone" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="email">@lang('lang.email')</label>
          <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="email">@lang('lang.password')</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="date_naissance">@lang('lang.birthday')</label>
          <input type="date" id="date_naissance" name="date_naissance" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="ville_id">@lang('lang.city')</label>
          <select id="ville_id" name="ville_id" class="form-control">
            @foreach ($villes as $ville)
              <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="It's a go!">
          <a href="{{ route('etudiant.index') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
        </div>
      </div>
    </form>
  </div>
@endsection
