@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <h3>Order</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Count</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(session('products') as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['count']}}</td>
                        <td>
                            <form action="{{route('items.destroy', ['item_id' => $item['food_id']])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4">Sum</th>
                    <th>$ {{auth()->user()->currentOrderTotalPrice()}}</th>
                </tr>
                </tbody>
            </table>
            <form action="{{route('items.storeOrder')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">Create order</button>
            </form>
        </div>
    </div>

@endsection
