@extends('layouts.success')

@section('title', 'Halaman Sukses')
    
@section('content')
    <main>
        <div class="section-succes d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url ('frontend/images/ic_mail.png') }}" alt=" /">
            <h1>Berhasil</h1>
            <p>Anda berhasil menyimpan <br> Selamat silahkan kembali</p>
            <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5" style="border-radius: 4px;
            background-color: #071C4D;
            color: #fff; ">
            Halaman Sukses
            </a>
        </div>
        </div>
    </main>
@endsection