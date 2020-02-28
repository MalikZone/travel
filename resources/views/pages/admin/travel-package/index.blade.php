@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
            <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50">Tambah Paket</i>
            </a>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data" width="100%" cellspacing='0'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Deparature Date</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @forelse ($items as $key => $item)
                            <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ $item->location }}</td>
                              <td>{{ $item->type }}</td>
                              <td>{{ $item->deperature_date }}</td>
                              <td>{{ $item->price }}</td>
                              <td>
                                <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('travel-package.destroy', $item->id) }}" method="post" class="d-inline"
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

         <!-- DataTales Example -->
        {{-- <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Paket Travel</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div> --}}

    </div>
@endsection