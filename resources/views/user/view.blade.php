@extends('adminlte::page')

@section('content')
    name: {{$user->name}}
    <br/>
    email: {{$user->email}}
    <br/>
    mc username: {{$user->mc_username}}
    <br/>
    permission group(s):
    @foreach($user->LpPlayer->groups() as $group)
        {{$group}}
    @endforeach
@endsection