<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamemode extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gamemode', 'port', 'description', 'added_to_server'
    ];

    /**
     * Gat a list with the status of the gamemode
     * @return array
     */
    function getStatus(){
        try{
            $socket = fsockopen('127.0.0.1', $this->port, $errno, $errstr, 0.5);
        }catch(\Exception $e){
            $socket = null;
        }

        if($socket){
            fwrite($socket, "\xfe");
            $data = fread($socket, 256);

            if(substr($data, 0, 1) != "\xff"){
                return array(
                    'online' => false,
                );
            }else{
                $data = explode("§",mb_convert_encoding(substr($data,3), "UTF8", "UCS-2"));
                return array(
                    'online'      => true,
                    'players'     => intval($data[1]),
                    'max_players' => intval($data[2]),
                );
            }
        }else{
            return array(
                'online' => false,
            );
        }
    }
}
