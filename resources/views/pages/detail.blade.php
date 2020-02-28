@extends('layouts.app')

@section('title', 'Halaman Detail')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
        <div class="container">
            <div class="row">
            <div class="col p-0 pl-3 pl-lg-0">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page" style="color:black;">
                    Paket Travel
                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:black;">
                    Details
                    </li>
                </ol>
                </nav>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                <h1>{{$travel_package->title}}</h1>
                <p>
                    {{$travel_package->location}}
                </p>

                @if ($travel_package->galleries->count())
                    <div class="gallery">
                        <div class="xzoom-container">
                        <img
                            class="xzoom"
                            id="xzoom-default"
                            src="{{Storage::url($travel_package->galleries->first()->images)}}"
                            xoriginal="{{Storage::url($travel_package->galleries->first()->images)}}"
                        />
                        <div class="xzoom-thumbs">
                            @foreach ($travel_package->galleries as $gallery)
                                <a href="{{Storage::url($gallery->images)}}"
                                ><img
                                    class="xzoom-gallery"
                                    width="128"
                                    src="{{Storage::url($gallery->images)}}"
                                    xpreview="{{Storage::url($gallery->images)}}"
                                /></a>
                            @endforeach
                        </div>
                        </div>
                        <h2>Tentang Wisata</h2>
                        <p>
                            {{$travel_package->about}}
                        </p>
                        <div class="features row pt-3">
                        <div class="col-md-4">
                            <img
                            src="{{url('frontend/images/ic_event.png')}}"
                            alt=""
                            class="features-image"
                            />
                            <div class="description">
                            <h3>Featured Ticket</h3>
                            <p>{{$travel_package->featured_event}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 border-left">
                            <img
                            src="{{url('frontend/images/ic_bahasa.png')}}"
                            alt=""
                            class="features-image"
                            />
                            <div class="description">
                            <h3>Language</h3>
                            <p>{{$travel_package->language}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 border-left">
                            <img
                            src="{{url('frontend/images/ic_foods.png')}}"
                            alt=""
                            class="features-image"
                            />
                            <div class="description">
                            <h3>Foods</h3>
                            <p>{{$travel_package->food}}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
                
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-details card-right">
                <h2 style="color:black;">Members are going</h2>
                <div class="members my-2">
                    <img src="{{url('frontend/images/members.png')}}" alt="" class="w-75" />
                </div>
                <hr />
                <h2 style="color:black;">Trip Informations</h2>
                <table class="trip-informations">
                    <tr>
                    <th width="50%" style="color:black;">Date of Departure</th>
                    <td width="50%" class="text-right" style="color:black;">{{ \Carbon\Carbon::create($travel_package->deperature_date)->format('F d, Y')}}</td>
                    </tr>
                    <tr>
                    <th width="50%" style="color:black;">Duration</th>
                    <td width="50%" class="text-right" style="color:black;">{{$travel_package->duration}}</td>
                    </tr>
                    <tr>
                    <th width="50%" style="color:black;">Type</th>
                    <td width="50%" class="text-right" style="color:black;">{{$travel_package->type}}</td>
                    </tr>
                    <tr>
                    <th width="50%" style="color:black;">Price</th>
                    <td width="50%" class="text-right" style="color:black;">Rp.{{$travel_package->price}}/ person</td>
                    </tr>
                </table>
                </div>
                <div class="join-container">
                    @auth
                        <form action="{{route('checkout-process', $travel_package->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">Join</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{route('login')}}" style="color:black;" class="btn btn-block btn-join-now mt-3 py-2">Login For Join</a>
                    @endguest
                </div>
            </div>
            </div>
        </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url ('frontend/libraries/xzoom/dist/xzoom.css') }}" />
@endpush

@push('addon-script')
    <script src="{{ url ('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
            });
        });
    </script>
@endpush