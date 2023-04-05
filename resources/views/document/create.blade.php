@extends('layouts.app')
@section('title', trans('lang.upload'))
@section('header', trans('lang.upload'))
@section('content')

  <div class="col-md-8">
    <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.provide_infos')
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="document">@lang('lang.document') (.zip, .pdf, .doc)</label>
          <input type="file" id="document" name="document" class="form-control" required>
          @error('format_error')
            <div class="alert alert-danger">{{ $errors->first('format_error') }}</div>
          @enderror
        </div>

        @php
          $lang_local = app()->getLocale();
          $lang_alt = $lang_local === 'en' ? 'fr' : 'en';
        @endphp

        {{-- Primary title (according to current language rendering) --}}
        <div class="control-grup col-12">
          <label for="title_{{ $lang_local }}">@lang('lang.local_name')</label>
          <input type="text" id="title_{{ $lang_local }}" name="title_{{ $lang_local }}" class="form-control" value='{{ old("title_{$lang_local}") }}' placeholder="@lang('lang.title_doc')" required>
          @error("title_{$lang_local}")
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        {{-- Alternative title (opposite of current language rendering) --}}
        <div class="control-grup col-12">
          <label for="title_{{ $lang_alt }}">@lang('lang.name_alt')</label>
          <input type="text" id="title_{{ $lang_alt }}" name="title_{{ $lang_alt }}" class="form-control" value='{{ old("title_{$lang_alt}") }}' placeholder="@lang('lang.optional')">
          @error("title_{$lang_alt}")
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="@lang('lang.submit')">
          <a href="{{ route('student.index') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
        </div>
      </div>
    </form>
  </div>
@endsection
