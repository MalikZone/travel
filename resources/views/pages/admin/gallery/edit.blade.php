@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit gallery {{ $gallery->title }}</h1>
            
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
                <form action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                  @csrf
                  <div class="form-group">
                    <label for="travel_package_id">Paket Travel</label>
                    <select class= "form-control" name="travel_package_id" required>
                      <option value="">--pilih paket travel--</option>
                      @foreach ($travel_package as $pkg)
                        <option value="{{ $pkg->id }}" 
                          {{ isset($gallery) && $gallery->travel_package_id == $pkg->id 
                            ? 'selected' : '' }}  
                        >
                          {{$pkg->title}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control" name="images">
                    <img src="{{ Storage::url($gallery->images) }}" alt="gambar" style="width: 150px;" class="img-thumbnail">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">
                    Edit
                  </button>
                </form>
            </div>
        </div>
    </div>
@endsection