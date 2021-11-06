@extends('layouts.app')

@section('componentcss')
    <style>
        .bg {
            background-image: url("{{$restaurant->image}}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 300px;
            width: 100%;
            filter: blur(7px);
            position: relative;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col shops">
            <div class="bg"></div>
            <h3 class="res-title">{{$restaurant->title}}</h3>
            <div class="res-description">
                {{$restaurant->desc}}
            </div>
        </div>
    </div>
    <div class="row" style="padding: 50px">
        <div class="col">
            <div class="tiles">
                @foreach($restaurant->foods as $f)
                    <div class="tile">
                        <div class="price">
                            {{$f->price}} $
                        </div>
                        <img src="{{$f->pic}}" alt="{{$f->pic}}">

                        <div class="details">
                            <span class="title">
                                {{$f->title}}
                            </span>
                            <span class="info">
                                {{$f->desc}}
                            </span>
                            <div class="top">
                                <a href="#" class="btn btn-sm btn-outline-primary bi bi-cart add-to-cart" data-food-id="{{$f->id}}">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
