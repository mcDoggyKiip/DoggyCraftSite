<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LpPlayer extends Model
{
    public function LpUserPermission(){
       return $this->hasMany('App\LpUserPermission', 'uuid', 'uuid');
    }

    public function groups(){
        $groups = [];
        foreach ($this->LpUserPermission as $perm){
            $perm = $perm->permission;
            if(substr($perm, 0 , 5) === "group"){
                array_push($groups, substr($perm, 6));
            }
        }
        return $groups;
    }
}
