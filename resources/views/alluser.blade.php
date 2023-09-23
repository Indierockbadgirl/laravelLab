@extends('layouts.appLab2')

@section('content')
    <h2>User List</h2>
    @foreach ($users as $user)
        <ul>
           <li>{{$user->user_name}}</li>
        </ul>
    @endforeach
@endsection