@extends('layouts.app')
@section('title', 'Post')
@section('content')

<!-- On pourrait vouloir mettre la premiere div dans le header pour rééutiliser -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                    {{ config('app.name')}}
                </div>
                @if(session('success'));
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session.success }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="display-6 mt-2">
                    {{$etudiant->nom}}
                </div>
                <p>
                {!! $etudiant->adresse !!}
                </p>
                <p>
                    <strong>Téléphone : </strong> {{$etudiant->phone}}
                </p>
                <p>
                    <strong>Courriel : </strong> {{$etudiant->email}}
                </p>
                <p>
                    <strong>Date de naissance : </strong> {{$etudiant->date_naissance}}
                </p>
                <p>
                    <strong>Ville (id) : </strong> {{$etudiant->ville_id}}
                </p>
                <a href="{{route('etudiant.index')}}" class="btn btn-sm btn-primary">Retourner</a>
            </div>
        </div>
        <div class="row mt-2">
            <hr>
            <div class="col-6">
                {{-- <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-success btn-small">Mettre à jour</a> --}}
            </div>
            <div class="col-6">
                <div class="card-footer">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Effacer
                    </button>
                </div>
            </div>
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
        Êtes-vous sûr que vous souhaitez supprimer ce post : {{ $etudiant->nom }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nevermind</button>
        {{-- <form action="{{ route('etudiant.delete', $etudiant) }}" method="post">
            @csrf
            @method('delete')
        <input type="submit" class="btn btn-danger btn-sm">
        </form> --}}
      </div>
    </div>
  </div>
</div>
@endsection