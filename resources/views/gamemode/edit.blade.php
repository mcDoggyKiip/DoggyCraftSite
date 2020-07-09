@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editing gamemode: {{$gamemode->gamemode}}</div>

                <div class="card-body">
                    <form method='POST' class="form-horizontal" action="{{route('gamemode.update', ['gamemode' => $gamemode->id])}}">
                        @csrf()
                        @method('PUT')
                        <div class="form-row">
                            <label for="name" class="col-md-1 col-form-label">Name:</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$gamemode->gamemode}}">
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="port" class="col-md-1 col-form-label">Port:</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="port" name="port" placeholder="25565" value="{{$gamemode->port}}"> {{-- #TODO: make number only and make sure port range is correct --}}
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="description" class="col-md-1 col-form-label">Description:</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" id="description" name="description" placeholder="The full description of the gamemode" value="{{$gamemode->description}}">
                            </div>
                        </div>

                        <br />
                        <button type="submit" class="btn bg-green">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection