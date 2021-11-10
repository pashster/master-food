@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h3>Users</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->format('Y-m-d')}}</td>
                        <td>
                            @if($user->approved)
                                <form action="{{route('admin.users.update', compact('user'))}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-sm btn-outline-success">Deactivate</button>
                                </form>
                            @else
                                <form action="{{route('admin.users.update', compact('user'))}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Activated</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
