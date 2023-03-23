@extends('layouts.app')
@section('title', 'Les articles')
@section('header', 'Les articles')
@section('content')

  <div class="col-12">
    <table class="table table-dark table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th class="text-center text-dark">Titre</th>
          <th class="text-center text-dark">Auteur</th>
          <th class="text-center text-dark">Extrait</th>
          <th class="text-center text-dark">Date de création</th>
          <th class="text-center text-dark">Dernière modification</th>
          <th class="text-center text-dark">Langue</th>
        </tr>
      </thead>
      <tbody>

        @forelse($articles as $article)
          <tr>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none link-light">{{ $article->title }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none link-light">{{ $article->user_id }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none link-light">{{ $article->body }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none link-light">{{ $article->created_at }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none link-light">{{ $article->updated_at }}</a>
            </td>
            <td class="text-center">
              <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none link-light">{{ $article->language }}</a>
            </td>
          </tr>

        @empty
          <tr>No article here!</tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="py-5">
    {{-- {{ $articles --}}
    {{ $pagination->links('layouts.pagination') }}
  </div>
@endsection
