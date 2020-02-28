@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">
      
        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
            <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50">Tambah Gallery</i>
            </a>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data" width="100%" cellspacing='0'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Travel</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          @forelse ($items as $key => $item)
                            <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->travel_package->title }}</td>
                              <td>
                                  <img src="{{ Storage::url($item->images) }}" alt="gambar" style="width: 150px;" class="img-thumbnail">                              
                              </td>
                              <td>
                                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ?')"
                                  >
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          @empty
                            <tr>
                              <td colspan="7" class="text-center">Empty Data</td>
                            </tr>
                          @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection