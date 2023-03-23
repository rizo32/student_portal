@extends('layouts.app')
@section('title', 'Modifier')
@section('header', 'Modifier les informations')
@section('content')

  <div class="col-md-8">
    <form action="{{ route('etudiant.update', $etudiant->user_id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.be_creative')
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="nom">@lang('lang.name') :</label>
          <input type="text" id="nom" name="nom" class="form-control" value="{{ $etudiant->nom }}">
        </div>

        <div class="control-grup col-12">
          <label for="adresse">@lang('lang.adress')</label>
          <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant->adresse }}" />
        </div>

        <div class="control-grup col-12">
          <label for="phone">@lang('lang.phone')</label>
          <input type="text" id="phone" name="phone" class="form-control" value="{{ $etudiant->phone }}" />
        </div>

        <div class="control-grup col-12">
          <label for="email">@lang('lang.email')</label>
          <input type="text" id="email" name="email" class="form-control" value="{{ $etudiant->etudiantBelongsToUser->email }}" />
        </div>

        <div class="control-grup col-12">
          <label for="date_naissance">@lang('lang.birthday')</label>
          <input type="text" id="date_naissance" name="date_naissance" class="form-control"
            value="{{ $etudiant->date_naissance }}" />
        </div>

        <div class="control-grup col-12">
          <label for="ville_id">@lang('lang.ville')</label>
          <select id="ville_id" name="ville_id" class="form-control">

            @foreach ($villes as $ville)
              <option value="{{ $ville->id }}" @if ($etudiant->ville_id == $ville->id) selected @endif>{{ $ville->nom }}
              </option>
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
