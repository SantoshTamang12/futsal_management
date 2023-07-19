<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuFilter implements FilterInterface
{
    public function transform($item)
    {
        //if role left empty or role is of the logged user

        if(isset($item['is_admin'])) {

            if(!auth()->guard('admin')->user() && $item['is_admin'] == 'Admin'){
        
                $item['restricted'] = true;
        
            }
        
            return $item;

        }  else {

            if(isset($item['role'])) {

                if(auth()->user()->role != ($item['role'] ?? "") && ($item['role'] ?? "All") != "All" ){
            
                    $item['restricted'] = true;
            
                }

                return $item;

            }

            return $item;

        }


    }
}