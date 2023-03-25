@extends('layouts.app')
@section('title', trans('lang.write_article'))
@section('header', trans('lang.write_article'))
@section('content')

  <div class="col-md-8">
    <form action="{{ route('article.store') }}" method="post">
      @csrf
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.be_creative')!
      </div>


      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-tab-pane"
                type="button" role="tab" aria-controls="en-tab-pane" aria-selected="true">English</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr-tab-pane" type="button"
                role="tab" aria-controls="fr-tab-pane" aria-selected="false">Français</button>
            </li>
          </ul>
        </div>

        <div class="tab-content">

          <div class="tab-pane fade show active" id="en-tab-pane" role="tabpanel" aria-labelledby="en-tab">

            <div class="control-grup col-12">
              <label for="title">@lang('lang.title') :</label>
              <input type="text" id="title" name="title_en" class="form-control" value="{{ old('title_en') }}">
              @error('title_en')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="control-grup col-12">
              <label for="body">@lang('lang.content')</label>
              <textarea id="body" name="body_en" class="form-control">{{ old('body_en') }}</textarea>
              @error('body_en')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


          <div class="tab-pane fade" id="fr-tab-pane" role="tabpanel" aria-labelledby="en-tab">

            <div class="control-grup col-12">
              <label for="title">@lang('lang.title') :</label>
              <input type="text" id="title" name="title_fr" class="form-control" value="{{ old('title_fr') }}">
              @error('title_fr')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="control-grup col-12">
              <label for="body">@lang('lang.content')</label>
              <textarea id="body" name="body_fr" class="form-control">{{ old('body_fr') }}</textarea>
              @error('body_fr')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>





        </div>



        {{-- <div class="text-light d-flex flex-column gap-3">
          <div class="control-grup col-12">
            <label for="title_fr">Titre du message Fr</label>
            <input type="text" id="title_fr" name="title_fr" class="form-control">
          </div>
          <div class="col-12">
            <label for="message_fr">Message Fr</label>
            <textarea class="form-control" id="message_fr" name="body_fr"></textarea>
          </div>
        </div> --}}


        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="@lang('lang.submit')!">
          <a href="{{ route('article.userArticle') }}" class="btn btn-secondary link-dark">@lang('lang.back_to_user_articles')</a>
        </div>
      </div>
    </form>
  </div>
@endsection
