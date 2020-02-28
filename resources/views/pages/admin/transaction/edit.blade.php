@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{ $transaction->title }}</h1>
            
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
                <form action="{{ route('transaction.update', $transaction->id) }}" method="post">
                @method('put')
                  @csrf
                  <div class="form-group">
                    <label for="title">Status</label>
                    <select name="transaction_status" class="form-control">
                      <option>{{$transaction->transaction_status}}</option>
                      <option value="IN_CHART">IN_CHART</option>
                      <option value="PENDING">PENDING</option>
                      <option value="SUCCESS">SUCCESS</option>
                      <option value="CANCEL">CANCEL</option>
                      <option value="FAILED">FAILED</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">
                    Edit
                  </button>
                </form>
            </div>
        </div>
    </div>
@endsection