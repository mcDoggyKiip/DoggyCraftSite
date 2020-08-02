<?php

namespace App\Http\Controllers;

use App\LpGroup;
use App\LpGroupPermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = LpGroup::join('lp_group_permissions', function ($join) {
            $join->on('lp_groups.name', '=', 'lp_group_permissions.name')->
            where('lp_group_permissions.permission', 'like', 'weight.%');
        })->orderByRaw("CONCAT(REPEAT(0,18 - LENGTH(SUBSTR(lp_group_permissions.permission, 7))), SUBSTR(lp_group_permissions.permission, 7)) DESC")->
        get();

        $LpGroups = LpGroup::all();
        $LpGroupPermission = LpGroupPermission::all();
        return view('permission.index')->with(['LpGroups' => $LpGroups, 'LpGroupPermissions' => $LpGroupPermission, 'groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
