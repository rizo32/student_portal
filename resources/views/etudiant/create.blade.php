@extends('layouts.app')
@section('title', 'Create')
@section('header', 'Admission')
@section('content')

  <div class="col-md-8">
    <form action="{{ route('etudiant.store') }}" method="post">
      @csrf
      <div class="card-header">
        Vos informations
      </div>
      <div class="card-body">
        <div class="control-grup col-12">
          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="nom">Adresse</label>
          <input type="text" id="adresse" name="adresse" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="phone">Téléphone</label>
          <input type="text" id="phone" name="phone" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="email">Courriel</label>
          <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="date_naissance">Date de naissance</label>
          <input type="date" id="date_naissance" name="date_naissance" class="form-control">
        </div>
        <div class="control-grup col-12">
          <label for="ville_id">Ville</label>
          <select id="ville_id" name="ville_id" class="form-control">
            @foreach ($villes as $ville)
              <option value="{{ $ville->id }}" {{-- @if ($etudiant->ville_id == $ville->id) --}} {{-- selected
                    @endif --}}>{{ $ville->nom }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="card-footer">
        <input type="submit" class="btn btn-success">
        <a href="{{ route('etudiant.index') }}" class="btn btn-sm btn-primary">Retourner</a>

      </div>
    </form>
  </div>
@endsection
