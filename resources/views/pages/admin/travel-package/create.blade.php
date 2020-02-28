@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
            
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('travel-package.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Location</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">About</label>
                    <input type="text" class="form-control" name="about" value="{{ old('about') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Featured Event</label>
                    <input type="text" class="form-control" name="featured_event" value="{{ old('featured_event') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Language</label>
                    <input type="text" class="form-control" name="language" value="{{ old('language') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Foods</label>
                    <input type="text" class="form-control" name="food" value="{{ old('food') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Deperature Date</label>
                    <input type="date" class="form-control" name="deperature_date" value="{{ old('deperature_date') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Duration</label>
                    <input type="text" class="form-control" name="duration" value="{{ old('duration') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Type</label>
                    <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                  </div>
                  <div class="form-group">
                    <label for="title">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">
                    Save
                  </button>
                </form>
            </div>
        </div>
    </div>
@endsection