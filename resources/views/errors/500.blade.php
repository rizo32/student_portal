<!-- resources/views/errors/500.blade.php -->
@extends('layouts.app')

@section('title', trans('lang.server_error'))

@section('content')
    <div class="alert alert-danger">
        <h1>@lang('lang.500_message')</h1>
        <p>@lang('lang.500_description')</p>
    </div>
@endsection
