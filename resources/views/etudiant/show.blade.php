@extends('layouts.app')
@section('title', $etudiant->nom)
@section('header', $etudiant->nom)
@section('content')

  <div class="col-md-6">
    @if (session('success'))
      <div class="card-header">
        <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif
    <a href="{{ route('etudiant.edit', $etudiant->user_id) }}" class="text-decoration-none">
      <table class="table table-dark table-striped table-hover">
        <tr>
          <td class="text-light"><strong>Adresse : </strong> {!! $etudiant->adresse !!}</td>
        </tr>
        <tr>
          <td class="text-light"><strong>Téléphone : </strong> {{ $etudiant->phone }}</td>
        </tr>
        <tr>
          <td class="text-light"><strong>Courriel : </strong> {{ $etudiant->user->email }}</td>
        </tr>
        <tr>
          <td class="text-light"><strong>Date de naissance : </strong> {{ $etudiant->date_naissance }}</td>
          </p>
        <tr>
          <td class="text-light"><strong>Ville : </strong> {{ $etudiant->ville->nom }}</td>
        </tr>
      </table>
    </a>
    <div class="d-flex justify-content-end gap-2">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Supprimer
      </button>
      <a href="{{ route('etudiant.index') }}" class="btn btn-secondary link-dark">Retour</a>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Attention!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr que vous souhaitez retirer {{ $etudiant->nom }} de la liste des étudiants?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mhhh...</button>
          <form action="{{ route('etudiant.delete', $etudiant) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Sûr comme un citron">
          </form>
        </div>
      </div>
    </div>
  @endsection
