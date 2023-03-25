@extends('layouts.app')
@section('title', trans('lang.the_articles'))
@section('header', trans('lang.the_articles'))
@section('content')

  <div class="col-12">
    <table class="table table-dark table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th class="text-center text-dark">@lang('lang.title')</th>
          <th class="text-center text-dark">@lang('lang.author')</th>
          <th class="text-center text-dark">@lang('lang.extract')</th>
          <th class="text-center text-dark">@lang('lang.creation_date')</th>
          <th class="text-center text-dark">@lang('lang.modification_date')</th>
          <th class="text-center text-dark">@lang('lang.language')</th>
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
          <tr>@lang('lang.be_creative')!</tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="py-5">
    {{-- {{ $articles --}}
    {{ $pagination->links('layouts.pagination') }}
  </div>
@endsection
