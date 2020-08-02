@extends('adminlte::page')

@section('content')
     <div class="card">
        <div class="card-header">Permission groups</div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    @foreach($groups as $group)
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    {{$group->name}}
                                </div>

                                <div class="card-body">
                                    Prefix:  {!!$group->prefix()!!}<br/> {{-- #TODO: this is not the right way!! --}}
                                    Weight: {{$group->weight()}}<br/>
                                    Permissions:<br/>
                                    {{-- list all permissions the group has --}}
                                    @foreach($LpGroupPermissions as $LpGroupPermission)
                                        {{-- filter all permissions on group name --}}
                                        @if($LpGroupPermission->name == ($group->name))
                                            - {{$LpGroupPermission->permission}}<br/>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection