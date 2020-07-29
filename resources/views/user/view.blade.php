@extends('adminlte::page')

@section('content')
    name: {{$user->name}}
    <br/>
    {{-- display the info if the logged in user belongs to the owner group. requirers the logged in user to have mc_username set--}}
    @if(isset(Auth::user()->mc_username))
        @if(in_array("owner", Auth::user()->LpPlayer->groups()))
            email: {{$user->email}}
            <br/>
            {{-- check if the requeste user has mc_username set--}}
            @if(isset($user->mc_username))
                mc username: {{$user->mc_username}}
                <br/>
                permission group(s):
                {{-- loop through all groups for the requested user--}}
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
                {{-- loop through all permissions for the requested user--}}
                @foreach($user->LpPlayer->LpUserPermission as $perm)
                    - {{$perm = $perm->permission}}
                @endforeach
                <br/>
                group permissions:
                <br/>
                {{-- loop through all permissions for the groups of the requested user--}}
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