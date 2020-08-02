<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LpGroup extends Model
{
    /**
     * get the weight of the group, the higher the weight the more important the group is
     * @return string
     */
    public function weight(){
        $result = LpGroupPermission::where('name', $this->name)->where('permission', 'like', 'weight.%')->get('permission')->first();
        if ($result != null){
            $result = explode(".", $result['permission']);
            return last($result);
        }else{
            return 'N/A';
        }
    }

    /**
     * get the prefix of the group
     * @return string
     */
    public function prefix(){
        $result = LpGroupPermission::where('name', $this->name)->where('permission', 'like', 'prefix.%')->get('permission')->first();
        if ($result != null){
            $result = explode(".", $result['permission']);
            $texts = explode("&", last($result));
            $output = '';
            foreach ($texts as $text){
                switch (substr($text,0,1)){
                    case '0':
                        $output .= "<span style='color: #000000'>".substr($text,1)."</span>";
                        break;
                    case '1':
                        $output .= "<span style='color: #0000AA'>".substr($text,1)."</span>";
                        break;
                    case '2':
                        $output .= "<span style='color: #00AA00'>".substr($text,1)."</span>";
                        break;
                    case '3':
                        $output .= "<span style='color: #00AAAA'>".substr($text,1)."</span>";
                        break;
                    case '4':
                        $output .= "<span style='color: #AA0000'>".substr($text,1)."</span>";
                        break;
                    case '5':
                        $output .= "<span style='color: #AA00AA'>".substr($text,1)."</span>";
                        break;
                    case '6':
                        $output .= "<span style='color: #FFAA00'>".substr($text,1)."</span>";
                        break;
                    case '7':
                        $output .= "<span style='color: #AAAAAA'>".substr($text,1)."</span>";
                        break;
                    case '8':
                        $output .= "<span style='color: #555555'>".substr($text,1)."</span>";
                        break;
                    case '9':
                        $output .= "<span style='color: #5555FF'>".substr($text,1)."</span>";
                        break;
                    case 'a':
                        $output .= "<span style='color: #55FF55'>".substr($text,1)."</span>";
                        break;
                    case 'b':
                        $output .= "<span style='color: #55FFFF'>".substr($text,1)."</span>";
                        break;
                    case 'c':
                        $output .= "<span style='color: #FF5555'>".substr($text,1)."</span>";
                        break;
                    case 'd':
                        $output .= "<span style='color: #FF55FF'>".substr($text,1)."</span>";
                        break;
                    case 'e':
                        $output .= "<span style='color: #FFFF55'>".substr($text,1)."</span>";
                        break;
                    default:
                        $output .= "<span>".substr($text,0)."</span>";
                        break;
                }
            }
            return $output;
        }else{
            return 'N/A';
        }
    }
}
