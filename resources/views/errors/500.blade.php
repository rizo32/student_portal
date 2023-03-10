<!-- resources/views/errors/500.blade.php -->
@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
    <div class="alert alert-danger">
        <h1>500 Error: Server Error</h1>
        <p>There was an error processing your request. Please try again later.</p>
    </div>
@endsection
