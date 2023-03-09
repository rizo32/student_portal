@extends('layouts.app')
@section('title', 'Modifier')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 text-center pt-2">
        <div class="display-6 mt-2">
          {{ $etudiant->etudiant_nom }}
        </div>
      </div>
    </div>
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="card-header">
            Formulaire
          </div>

          <div class="control-grup col-12">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $etudiant->nom }}">
          </div>

          <div class="control-grup col-12">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant->adresse }}"/>
          </div>

          <div class="control-grup col-12">
            <label for="phone">Numéro de téléphone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $etudiant->phone }}"/>
          </div>

          <div class="control-grup col-12">
            <label for="email">Courriel</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ $etudiant->email }}"/>
          </div>

          <div class="control-grup col-12">
            <label for="date_naissance">Date de naissance</label>
            <input type="text" id="date_naissance" name="date_naissance" class="form-control" value="{{ $etudiant->date_naissance }}"/>
          </div>

          <div class="control-grup col-12">
            <label for="ville_id">Ville</label>
            <select id="ville_id" name="ville_id" class="form-control">

              @foreach($villes as $ville)
              
              <option value="{{ $ville->id }}"
                
                @if($etudiant->ville_id == $ville->id)
                selected
                @endif
                
                >{{ $ville->nom }}</option>

              @endforeach
            </select>

          </div>

          <div class="card-footer">
            <input type="submit" class="btn btn-success">
          </div>

        </form>
      </div>
    </div>
  </div>
  <!--/container-->

@endsection