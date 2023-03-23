@extends('layouts.app')
@section('title', @lang('lang.write_article'))
@section('header', @lang('lang.write_article'))
@section('content')

  <div class="col-md-8">
    <form action="{{ route('article.store') }}" method="post">
      @csrf
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.be_creative')!
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="title">@lang('lang.title') :</label>
          <input type="text" id="title" name="title" class="form-control">
        </div>

        <div class="control-grup col-12">
          <label for="language">@lang('lang.language')</label>
          <input type="text" id="language" name="language" class="form-control" />
        </div>

        <div class="control-grup col-12">
          <label for="body">@lang('lang.content')</label>
          <textarea id="body" name="body" class="form-control"></textarea>
        </div>

        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="@lang('lang.submit')!">
          <a href="{{ route('article.userArticle') }}" class="btn btn-secondary link-dark">@lang('lang.back_to_user_articles')</a>
        </div>
      </div>
    </form>
  </div>
@endsection
