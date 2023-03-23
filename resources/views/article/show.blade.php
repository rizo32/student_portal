@extends('layouts.app')
@section('title', $article->nom)
@section('header', $article->nom)
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

    @if ($loggedUser == $article->user_id)
      <a href="{{ route('article.edit', $article->id) }}" class="text-decoration-none">
    @endif


    <table class="table table-dark table-striped table-hover">
      <tr>
        <td class="text-light"><strong>@lang('lang.title') : </strong> {!! $article->title !!}</td>
      </tr>
      <tr>
        <td class="text-light"><strong>@lang('lang.author') : </strong> {{ $article->articleBelongsToUser->userHasOneEtudiant->name }}
        </td>
      </tr>
      <tr>
        <td class="text-light"><strong>@lang('lang.content') : </strong> {{ $article->body }}</td>
      </tr>
      <tr>
        <td class="text-light"><strong>Date de création : </strong> {{ $article->creation_date }}</td>
        </p>
      <tr>
        <td class="text-light"><strong>@lang('lang.modification_date') : </strong> {{ $article->modification_date }}</td>
      </tr>
      <tr>
        <td class="text-light"><strong>@lang('lang.language') : </strong> {{ $article->language }}</td>
      </tr>
    </table>
    @if ($loggedUser == $article->user_id)
      </a>
    @endif

    <div class="d-flex justify-content-end gap-2">
      @if ($loggedUser == $article->user_id)
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          @lang('lang.delete')
        </button>
      @endif

      <a href="{{ route('article.index') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
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
  @endsection
