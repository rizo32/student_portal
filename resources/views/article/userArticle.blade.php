@extends('layouts.app')
@section('title', trans('lang.my_articles'))
@section('header', trans('lang.my_articles'))
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
          <th class="text-center text-dark">@lang('lang.title')</th>
          <th class="text-center text-dark">@lang('lang.extract')</th>
          <th class="text-center text-dark">@lang('lang.creation_date')</th>
          <th class="text-center text-dark">@lang('lang.modification_date')</th>
          <th class="text-center text-dark">@lang('lang.language')</th>
          <th class="text-center text-dark">@lang('lang.edit')</th>
          <th class="text-center text-dark">@lang('lang.delete')</th>
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
                <button type="button" class="btn-unstyled" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}">
                  {!! $icon !!}
                </button>
              </div>

            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="deleteModal{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.warning')!</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @lang('lang.confirm_article_delete'){{ $article->title }}?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.no')!</button>
                  <form action="{{ route('article.delete', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.confirm')">
                  </form>
                </div>
              </div>
            </div>

        @empty
          <tr>@lang('lang.no_article')</tr>
        @endforelse
      </tbody>
    </table>
  </div>


    <div class="py-5">
      {{ $pagination->links('layouts.pagination') }}
    </div>
  @endsection
