@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
            
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
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="title">Paket Travel</label>
                    <select class= "form-control" name="travel_package_id" required>
                      <option value="">--pilih paket travel--</option>
                      @foreach ($travel_package as $item)
                          <option value="{{ $item->id }}">
                            {{ $item->title }}
                          </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control" name="images">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">
                    Save
                  </button>
                </form>
            </div>
        </div>
    </div>
@endsection