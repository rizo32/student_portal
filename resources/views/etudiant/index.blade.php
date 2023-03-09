@extends('layouts.app')
@section('title', 'Nos étudiants')
@section('header', 'Nos étudiants')
@section('content')

  <div class="col-12">
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
            <td class="text-center"><a href="{{ route('etudiant.show', $etudiant->id) }}"
                class="text-decoration-none link-light">{{ $etudiant->nom }}</a></td>
            <td class="text-center"><a href="{{ route('etudiant.show', $etudiant->id) }}"
                class="text-decoration-none link-light">{{ $etudiant->email }}</a></td>
            <td class="text-center"><a href="{{ route('etudiant.show', $etudiant->id) }}"
                class="text-decoration-none link-light">{{ $etudiant->date_naissance }}</a></td>
            <td class="text-center"><a href="{{ route('etudiant.edit', $etudiant->id) }}"
                class="text-decoration-none link-light">
                <i class="fa-solid fa-rotate-right text-primary"></i>
              </a></td>
            <td class="text-center">
              <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="POST"
                class="text-decoration-none link-light">
                @csrf
                @method('delete')
                {{-- <i class="fa-solid fa-xmark text-danger"><input type="submit" value=""></i> --}}
                <button type="submit" class="btn-unstyled">
                  {!! $icon !!}
                </button>
              </form>
            </td>
          </tr>

        @empty
          <tr>Aucun étudiant sélectionné</tr>
        @endforelse
      </tbody>
    </table>
    <?php
    
    // <a href="{{ route('etudiant.create') }}" class="btn btn-success">
    // </a>
    ?>

  </div>
  <div class="py-5">
    {{ $etudiants }}

  </div>
@endsection
