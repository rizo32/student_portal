<!-- resources/views/errors/404.blade.php -->
@extends('layouts.app')

@section('title', trans('lang.page_not_found'))

@section('content')
    <div class="alert alert-danger">
        <h1>@lang('lang.404_message')</h1>
        <p>@lang('lang.404_description')</p>
    </div>
@endsection
