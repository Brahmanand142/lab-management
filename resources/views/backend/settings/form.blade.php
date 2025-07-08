@extends('backend.layouts.master')
@section('title', 'Site Setting')
@section('content')

@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

{{ dd($setting)}}

<form action='{{route("site.settings.update")}}' method='POST'>
    @csrf
  <div class="mb-3">
    <label for="sitename" class="form-label">Site Name</label>
    <input type="text" class="form-control" id="sitename" value="{{ old('sitename') ? old('sitename') : $setting[sitename]  }}" name='sitename'>
 </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" class="form-control" id="phone" name='phone' value="{{ old('phone') }}">
  </div>
  
  <div class="mb-3">
    <label for="address" class="form-label">address</label>
    <input type="text" class="form-control" id="address" name='address' value="{{ old('address') }}">
  </div>

  
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" name='email' value="{{ old('email') }}">
  </div>

  
  <div class="mb-3">
    <label for="opening_hours" class="form-label">opening_hours</label>
    <input type="text" class="form-control" id="opening_hours" name='opening_hours' value="{{ old('opening_hours') }}">
  </div>

  
  <div class="mb-3">
    <label for="facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="facebook" name='facebook' value="{{ old('facebook') }}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection

