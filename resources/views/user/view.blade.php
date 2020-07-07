@extends('adminlte::page')

@section('content')
    name: {{$user->name}}
    <br>
    email: {{$user->email}}
@endsection