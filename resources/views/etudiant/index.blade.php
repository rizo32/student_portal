@extends('layouts.app')
@section('title', 'Nos étudiants')
@section('header', 'Nos étudiants')
@section('content')

  <div class="col-12">
    @if (session('success'))
      <div class="card-header">
        <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif
    <table class="table table-dark table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th class="text-center text-dark">Nom</th>
          <th class="text-center text-dark">Courriel</th>
          <th class="text-center text-dark">Date de naissance</th>
          <th class="text-center text-dark">Modifier</th>
          <th class="text-center text-dark">Supprimer</th>
        </tr>
      </thead>
      <tbody>

        @forelse($etudiants as $etudiant)
          <tr>
            <td class="text-center"><a href="{{ route('etudiant.show', $etudiant->user_id) }}"
                class="text-decoration-none link-light">{{ $etudiant->nom }}</a></td>
            <td class="text-center"><a href="{{ route('etudiant.show', $etudiant->user_id) }}"
                class="text-decoration-none link-light">{{ $etudiant->etudiantBelongsToUser->email }}</a></td>
            <td class="text-center"><a href="{{ route('etudiant.show', $etudiant->user_id) }}"
                class="text-decoration-none link-light">{{ $etudiant->date_naissance }}</a></td>
            <td class="text-center"><a href="{{ route('etudiant.edit', $etudiant->user_id) }}"
                class="text-decoration-none link-light">
                <i class="fa-solid fa-rotate-right text-primary"></i>
              </a></td>
            <td class="text-center">
              <div class="text-decoration-none link-light">
                <button type="button" class="btn-unstyled" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  {!! $icon !!}
                </button>
              </div>
            </td>
          </tr>

        @empty
          <tr>Aucun étudiant sélectionné</tr>
        @endforelse
      </tbody>
    </table>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Oh non!</button>
            <form action="{{ route('article.delete', $etudiant) }}" method="post">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-danger" value="Sûr comme un citron">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="py-5">
      {{ $pagination->links('layouts.pagination') }}
    </div>
  @endsection
