@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(isset(Auth::user()->mc_username))
                        @if(in_array("owner", Auth::user()->LpPlayer->groups()))
                            Congrats, you are the owner of the best server ever!
                        @endif
                        @if(in_array("builder", Auth::user()->LpPlayer->groups()))
                            Building one hack of a server!
                        @endif
                        @if(in_array("default", Auth::user()->LpPlayer->groups()))
                            Thank you for playing on the server !
                        @endif
                    @endif
                    <example-component></example-component>
                </div>
            </div>
        </div>
    </div>
@endsection
