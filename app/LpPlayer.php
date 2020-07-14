<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LpPlayer extends Model
{

    /**
     * Get a list off all user permissions.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function LpUserPermission(){
       return $this->hasMany('App\LpUserPermission', 'uuid', 'uuid');
    }

    /**
     * Get a list off all the groups the user is in.
     * @return array
     */
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

    /**
     * Get a list of all the permissions based on the groups the player has
     * @return array
     */
    public function LpGroupPermission(){
        $groupperms = [];
        $groups = $this->groups();
        foreach ($groups as $group){
            $theseperms = LpGroupPermission::where('name', $group)->get();
            array_push($groupperms, $theseperms);
        }
        return $groupperms;
    }
}
