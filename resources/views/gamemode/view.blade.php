@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gamemode: {{$gamemode->gamemode}}</div>

                <div class="card-body">
                    {{$gamemode->description}}
                </div>
            </div>
        </div>
    </div>
@endsection