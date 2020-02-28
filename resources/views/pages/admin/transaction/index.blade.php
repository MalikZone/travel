@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data" width="100%" cellspacing='0'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>travel</th>
                                <th>User</th>
                                <th>Visa</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @forelse ($transaction as $key => $item)
                            <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $item->travel_package->title }}</td>
                              <td>{{ $item->user->name }}</td>
                              <td>{{ $item->additional_visa }}</td>
                              <td>{{ $item->transaction_total }}</td>
                              <td>
                                @if ($item->transaction_status == "IN_CHART")
                                    <span class="badge badge-primary">IN_CHART</span>
                                @elseif ($item->transaction_status == "PENDING")
                                    <span class="badge badge-warning">PENDING</span>
                                @elseif ($item->transaction_status == "SUCCESS")
                                    <span class="badge badge-success">SUCCESS</span>
                                @elseif ($item->transaction_status == "CANCEL")
                                    <span class="badge badge-secondary">CANCEL</span>
                                @else
                                    <span class="badge badge-danger">FAILED</span>
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                                  <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-info">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('transaction.destroy', $item->id) }}" method="post" class="d-inline"
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