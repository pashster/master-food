@extends('layouts.app')

@if(Auth::check())
@section('cart-section')
    @include('carts.cart')
@endsection
@endif

@section('content')
    @if(session('success'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h3>Restaurants</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="tiles">
                @foreach($restaurants as $r)
                    <a href="{{route('restaurants.show', ['restaurant' => $r])}}" class="tile">
                        <img src="{{$r->image}}" alt="{{$r->image}}">
                        <div class="details">
                            <span class="title">
                                {{$r->title}}
                            </span>
                            <span class="info">
                                {{$r->desc}}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
