@extends('adminlte::page')

@section('content')
    name: {{$user->name}}
    <br/>
    @if(isset(Auth::user()->mc_username))
        @if(in_array("owner", Auth::user()->LpPlayer->groups()))
            email: {{$user->email}}
            <br/>
            @if(isset($user->mc_username))
                mc username: {{$user->mc_username}}
                <br/>
                permission group(s):
                @foreach($user->LpPlayer->groups() as $group)
                    @if(!$loop->last)
                        {{$group}},
                    @else
                        {{$group}}
                    @endif
                @endforeach
                <br/>
                user permissions:
                <br/>
                @foreach($user->LpPlayer->LpUserPermission as $perm)
                    - {{$perm = $perm->permission}}
                @endforeach
                <br/>
                group permissions:
                <br/>
                @foreach($user->LpPlayer->LpGroupPermission() as $permgroup)
                    @foreach($permgroup as $perm)
                        @if(!$loop->last)
                            - {{$perm = $perm->permission}}<br>
                        @else
                            - {{$perm = $perm->permission}}
                        @endif
                    @endforeach
                @endforeach
            @endif
        @endif
    @endif
@endsection