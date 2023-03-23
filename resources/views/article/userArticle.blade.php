@extends('layouts.app')
@section('title', 'Mes articles')
@section('header', 'Mes articles')
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
          <th class="text-center text-dark">Titre</th>
          <th class="text-center text-dark">Extrait</th>
          <th class="text-center text-dark">Date de création</th>
          <th class="text-center text-dark">Dernière modification</th>
          <th class="text-center text-dark">Langue</th>
          <th class="text-center text-dark">Modifier</th>
          <th class="text-center text-dark">Supprimer</th>
        </tr>
      </thead>
      <tbody>

        @forelse($articles as $article)
          <tr>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}"
                class="text-decoration-none link-light">{{ $article->title }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}"
                class="text-decoration-none link-light">{{ $article->body }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}"
                class="text-decoration-none link-light">{{ $article->created_at }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}"
                class="text-decoration-none link-light">{{ $article->updated_at }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}"
                class="text-decoration-none link-light">{{ $article->language }}</a>
            </td>
            <td class="text-center"><a href="{{ route('article.edit', $article->id) }}"
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
          <tr>No article here!</tr>
        @endforelse
      </tbody>
    </table>
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
          Êtes-vous sûr que vous souhaitez supprimer définitivement votre article {{ $article->title }}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Oh non!</button>
          <form action="{{ route('article.delete', $article) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Sûr comme un citron">
          </form>
        </div>
      </div>
    </div>
    <div class="py-5">
      {{-- {{ $articles --}}
      {{ $pagination->links('layouts.pagination') }}
    </div>
  @endsection
