@extends('layouts.app')
@section('title', trans('lang.edit_title'))
@section('header', trans('lang.edit_infos'))
@section('content')

  <div class="col-md-8">
    <form action="{{ route('student.update', $student->user_id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.be_creative')
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="name">@lang('lang.name') :</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $student->name) }}">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="address">@lang('lang.address')</label>
          <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $student->address) }}" />
          @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="phone">@lang('lang.phone')</label>
          <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone',$student->phone) }}" />
          @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="email">@lang('lang.email')</label>
          <input type="text" id="email" name="email" class="form-control" value="{{ $student->user->email }}" disabled >
        </div>

        <div class="control-grup col-12">
          <label for="birthday">@lang('lang.birthday')</label>
          <input type="date" id="birthday" name="birthday" class="form-control" value="{{ old('birthday', $student->birthday) }}" />
          @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="control-grup col-12">
          <label for="city_id">@lang('lang.city')</label>
          <select id="city_id" name="city_id" class="form-control">
            @error('city_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @foreach ($cities as $city)
              <option value="{{ $city->id }}" @if ($student->city_id == $city->id) selected @endif>{{ $city->name }}
              </option>
            @endforeach
          </select>

        </div>
        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="@lang('lang.submit')">
          <a href="{{ route('student.index') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
        </div>
      </div>

    </form>
  </div>

@endsection
