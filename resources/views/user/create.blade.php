@extends('layouts.app')
@section('title', 'Create')
@section('header', 'Admission')
@section('content')

  <div class="col-md-8">
    <form action="{{ route('user.store') }}" method="post">
      @csrf
      <div class="card-header text-secondary fst-italic text-center">
        @lang('lang.provide_infos')
      </div>
      <div class="text-light d-flex flex-column gap-3">
        <div class="control-grup col-12">
          <label for="name">@lang('lang.name')</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="name">@lang('lang.address')</label>
          <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
          @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="phone">@lang('lang.phone')</label>
          <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
          @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="email">@lang('lang.email')</label>
          <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="password">@lang('lang.password') (@lang('lang.pass_requirements'))</label>
          <input type="password" id="password" name="password" class="form-control" required>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="password_confirmation">@lang('lang.password_confirm')</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
          @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="birthday">@lang('lang.birthday')</label>
          <input type="date" id="birthday" name="birthday" class="form-control" value="{{ old('birthday') }}"
            required>
          @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="control-grup col-12">
          <label for="city_id">@lang('lang.city')</label>
          <select id="city_id" name="city_id" class="form-control" value="{{ old('city_id') }}" required>
            @foreach ($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
          </select>
          @error('city_id')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="d-flex justify-content-end gap-2">
          <input type="submit" class="btn btn-primary" value="It's a go!">
          <a href="{{ route('student.index') }}" class="btn btn-secondary link-dark">@lang('lang.back')</a>
        </div>
      </div>
    </form>
  </div>
@endsection
