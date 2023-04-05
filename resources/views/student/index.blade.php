@extends('layouts.app')
@section('title', trans('lang.our_students'))
@section('header', trans('lang.our_students'))
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
          <th class="text-center text-dark">@lang('lang.name')</th>
          <th class="text-center text-dark">@lang('lang.email')</th>
          <th class="text-center text-dark">@lang('lang.birthday')</th>
        </tr>
      </thead>
      <tbody>

        @forelse($students as $student)
          <tr>
            <td class="text-center"><a href="{{ route('student.show', $student->user_id) }}"
                class="text-decoration-none link-light">{{ $student->name }}</a></td>
            <td class="text-center"><a href="{{ route('student.show', $student->user_id) }}"
                class="text-decoration-none link-light">{{ $student->user->email }}</a></td>
            <td class="text-center"><a href="{{ route('student.show', $student->user_id) }}"
                class="text-decoration-none link-light">{{ $student->birthday }}</a></td>
          </tr>

        @empty
          <tr>@lang('lang.no_student')</tr>
        @endforelse
      </tbody>
    </table>
    <div class="py-5">
      {{ $pagination->links('layouts.pagination') }}
    </div>
  @endsection
