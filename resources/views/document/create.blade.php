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
          <label for="document">@lang('lang.document')</label>
          <input type="file" id="document" name="document" class="form-control" required>
          @error('format_error')
            <div class="alert alert-danger">{{ $errors->first('format_error') }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="title">@lang('lang.name')</label>
          <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="@lang('lang.title_doc')" required>
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="language_id">@lang('lang.language')</label>
          <select id="language_id" name="language_id" class="form-control" value="{{ old('language_id') }}" required>
            @foreach ($languages as $language)
              <option value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
          </select>
          @error('language_id')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="title">@lang('lang.name_alt')</label>
          <input type="text" id="title_alt" name="title_alt" class="form-control" value="{{ old('title_alt') }}" placeholder="@lang('lang.optional')" required>
          @error('title')
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
