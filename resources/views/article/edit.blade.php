@extends('layouts.app')
@section('title', trans('lang.modification_article'))
@section('header', trans('lang.modification_article'))
@section('content')

  <div class="col-md-8">
    <form action="{{ route('article.update', $article->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.be_creative')
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="title">@lang('lang.title') :</label>
          <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}">
        </div>

        <div class="control-grup col-12">
          <label for="language">@lang('lang.language')</label>
          <input type="text" id="language" name="language" class="form-control" value="{{ $article->language }}" />
        </div>

        <div class="control-grup col-12">
          <label for="body">@lang('lang.content')</label>
          <textarea id="body" name="body" class="form-control">{{ $article->body }}</textarea>
        </div>

        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="@lang('lang.submit')">
          <a href="{{ route('article.userArticle') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
        </div>
      </div>

    </form>

  </div>

@endsection
