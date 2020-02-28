@extends('layouts.admin')

@section('title','Halaman Dashboard')
    
@section('content')
    <div class="container-fluid">

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
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{$transaction->id}}</td>
                    </tr>
                    <tr>
                        <th>Paket Travel</th>
                        <td>{{$transaction->travel_package->id}}</td>
                    </tr>
                    <tr>
                        <th>Pembeli</th>
                        <td>{{$transaction->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Additional Visa</th>
                        <td>{{$transaction->additional_visa}}</td>
                    </tr>
                    <tr>
                        <th>Total Transaksi</th>
                        <td>{{$transaction->transaction_total}}</td>
                    </tr>
                    <tr>
                        <th>Status Transaksi</th>
                        <td>
                            @if ($transaction->transaction_status == "IN_CHART")
                                <span class="badge badge-primary">IN_CHART</span>
                            @elseif ($transaction->transaction_status == "PENDING")
                                <span class="badge badge-warning">PENDING</span>
                            @elseif ($transaction->transaction_status == "SUCCESS")
                                <span class="badge badge-success">SUCCESS</span>
                            @elseif ($transaction->transaction_status == "CANCEL")
                                <span class="badge badge-secondary">CANCEL</span>
                            @else
                                <span class="badge badge-danger">FAILED</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Pembelian</th>
                        <td>
                            <table class="table table-dark" id="data">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Nationality</th>
                                        <th>Visa</th>
                                        <th>Passport</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction->details as $detail)
                                        <tr>
                                            <td>{{$detail->id}}</td>
                                            <td>{{$detail->username}}</td>
                                            <td>{{$detail->nationality}}</td>
                                            <td>{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                            <td>{{$detail->doe_passport}}</td>
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection