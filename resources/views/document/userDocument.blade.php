@extends('layouts.app')
@section('title', trans('lang.my_documents'))
@section('header', trans('lang.my_documents'))
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
    @if (session('errors'))
    <div class="card-header">
      <div class="alert alert-danger alert-dismissible fade show text-dark" role="alert">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @endif
    <table class="table table-dark table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th class="text-center text-dark">@lang('lang.title')</th>
          <th class="text-center text-dark">@lang('lang.format')</th>
          <th class="text-center text-dark">@lang('lang.creation_date')</th>
          <th class="text-center text-dark">@lang('lang.modification_date')</th>
          <th class="text-center text-dark">@lang('lang.download')</th>
          <th class="text-center text-dark">@lang('lang.edit')</th>
          <th class="text-center text-dark">@lang('lang.delete')</th>
        </tr>
      </thead>
      <tbody>

        @php
          $lang_local = app()->getLocale();
          $lang_alt = $lang_local === 'en' ? 'fr' : 'en';
        @endphp

        @forelse($documents as $document)
          <tr>
            <td class="text-center">
              <a href="{{ route('document.show', $document->id) }}" class="text-decoration-none link-light">
                @if (isset($document->{'title_' . $lang_local}))
                  {{ $document->{'title_' . $lang_local} }}
                @else
                  {{ __('lang.no_title') }}
                @endif
              </a>
            </td>
            <td class="text-center">
              <a href="{{ route('document.show', $document->id) }}" class="text-decoration-none link-light">
                {{ $document->format->name }}
              </a>
            </td>
            <td class="text-center">
              <a href="{{ route('document.show', $document->id) }}" class="text-decoration-none link-light">
                {{ $document->created_at }}
              </a>
            </td>
            <td class="text-center">
              <a href="{{ route('document.show', $document->id) }}" class="text-decoration-none link-light">
                {{ $document->updated_at }}
              </a>
            </td>
            <td class="text-center">
              <a href="{{ route('document.download', $document->id) }}" class="text-decoration-none link-light">
                <i class="fa-solid fa-arrow-down text-primary"></i>
              </a>
            </td>
            <td class="text-center">
              <a href="{{ route('document.edit', $document->id) }}" class="text-decoration-none link-light">
                <i class="fa-solid fa-rotate-right text-primary"></i>
              </a>
            </td>
            <td class="text-center">
              <div class="text-decoration-none link-light">
                <button type="button" class="btn-unstyled" data-bs-toggle="modal"
                  data-bs-target="#deleteModal{{ $document->id }}">
                  {!! $icon !!}
                </button>
              </div>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="deleteModal{{ $document->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.warning')!</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @lang('lang.confirm_document_delete'){{ $document->title }}?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.no')!</button>
                  <form action="{{ route('document.delete', $document->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.confirm')">
                  </form>
                </div>
              </div>
            </div>
          @empty
            <tr>@lang('lang.no_document')</tr>
        @endforelse
      </tbody>
    </table>
  </div>


  <div class="py-5">
    {{ $pagination->links('layouts.pagination') }}
  </div>
@endsection
