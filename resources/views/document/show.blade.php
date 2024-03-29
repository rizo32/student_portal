@extends('layouts.app')
@section('title', $student->name)
@section('header', $student->name)
@section('content')

  <div class="col-md-6">
    @if (session('success'))
      <div class="card-header">
        <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif
    <a href="{{ route('student.edit', $student->user_id) }}" class="text-decoration-none">
      <table class="table table-dark table-striped table-hover">
        <tr>
          <td class="text-light"><strong>@lang('lang.address') : </strong> {!! $student->address !!}</td>
        </tr>
        <tr>
          <td class="text-light"><strong>@lang('lang.phone') : </strong> {{ $student->phone }}</td>
        </tr>
        <tr>
          <td class="text-light"><strong>@lang('lang.email') : </strong> {{ $student->user->email }}</td>
        </tr>
        <tr>
          <td class="text-light"><strong>@lang('lang.birthday') : </strong> {{ $student->birthday }}</td>
          </p>
        <tr>
          <td class="text-light"><strong>@lang('lang.city') : </strong> {{ $student->city->name }}</td>
        </tr>
      </table>
    </a>
    <div class="d-flex justify-content-end gap-2">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        @lang('lang.delete')
      </button>
      <a href="{{ route('student.index') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.warning')!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @lang('lang.are_you_sure') {{ $student->name }} @lang('lang.student_list')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.no')</button>
          <form action="{{ route('student.delete', $student) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="@lang('lang.confirm')">
          </form>
        </div>
      </div>
    </div>
  @endsection
