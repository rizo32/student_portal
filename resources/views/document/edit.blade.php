@extends('layouts.app')
@section('title', trans('lang.edit_title'))
@section('header', trans('lang.edit_infos'))
@section('content')

  <div class="col-md-8">
    <form action="{{ route('document.update', $document->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.be_creative')
      </div>
      <div class="text-light d-flex flex-column gap-3">

        @php
          $lang_local = app()->getLocale();
          $lang_alt = $lang_local === 'en' ? 'fr' : 'en';
        @endphp

        {{-- Primary title (according to current language rendering) --}}
        <div class="control-grup col-12">
          <label for="title_{{ $lang_local }}">@lang('lang.local_name')</label>
          <input type="text" id="title_{{ $lang_local }}" name="title_{{ $lang_local }}" class="form-control"
            value='{{ $document->{'title_'.$lang_local} }}' placeholder="@lang('lang.title_doc')" required>
          @error("title_{$lang_local}")
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        {{-- Alternative title (opposite of current language rendering) --}}
        <div class="control-grup col-12">
          <label for="title_{{ $lang_alt }}">@lang('lang.name_alt')</label>
          <input type="text" id="title_{{ $lang_alt }}" name="title_{{ $lang_alt }}" class="form-control"
            value='{{ $document->{ 'title_'.$lang_alt } }}' placeholder="@lang('lang.optional')">
          @error("title_{$lang_alt}")
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>


        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="@lang('lang.submit')">
          <a href="{{ route('document.userDocument') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
        </div>
      </div>
  </div>

  </form>
  </div>

@endsection
