@extends('layouts.app')
@section('title', 'Modification article')
@section('header', 'Modifier les informations')
@section('content')

  <div class="col-md-8">
    <form action="{{ route('article.update', $article->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-header text-secondary fst-italic text-center">
        Soyez créatif!
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="title">Titre :</label>
          <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}">
        </div>

        <div class="control-grup col-12">
          <label for="language">Langue</label>
          <input type="text" id="language" name="language" class="form-control" value="{{ $article->language }}" />
        </div>

        <div class="control-grup col-12">
          <label for="body">Contenu</label>
          <textarea id="body" name="body" class="form-control">{{ $article->body }}</textarea>
        </div>

        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="It's a go!">
          <a href="{{ route('article.index') }}" class="btn btn-secondary link-dark">Retour</a>
        </div>
      </div>

    </form>

  </div>

@endsection
