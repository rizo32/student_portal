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
          <th class="text-center text-dark">@lang('lang.edit')</th>
          <th class="text-center text-dark">@lang('lang.delete')</th>
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
            <td class="text-center"><a href="{{ route('student.edit', $student->user_id) }}"
                class="text-decoration-none link-light">
                <i class="fa-solid fa-rotate-right text-primary"></i>
              </a></td>
            <td class="text-center">
              <div class="text-decoration-none link-light">
                <button type="button" class="btn-unstyled" data-bs-toggle="modal"
                  data-bs-target="#deleteModal{{ $student->user_id }}">
                  {!! $iconHtml !!}
                </button>
              </div>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="deleteModal{{ $student->user_id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.warning')!</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">@lang('lang.are_you_sure')
                  {{ $student->name }}@lang('lang.student_list')?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.no')!</button>
                  <form action="{{ route('student.delete', $student) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.confirm')">
                  </form>
                </div>
              </div>
            </div>
          </div>

        @empty
          <tr>@lang('lang.no_student')</tr>
        @endforelse
      </tbody>
    </table>
    <div class="py-5">
      {{ $pagination->links('layouts.pagination') }}
    </div>
  @endsection
