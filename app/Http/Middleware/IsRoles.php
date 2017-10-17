<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\UserGroup;
use App\Models\UserPermistion;

class IsRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(config('constants.ACTIVE_PER') == 1):
        $name_route_current = $request->route()->getName();
        $groud_id_curent = Auth::user()->group_id;
        $permistion_accept = UserGroup::select('permistion_list')->where('id',$groud_id_curent)->get()->first()->toArray();
        $array_id_per = json_decode($permistion_accept['permistion_list']);
        $data = UserPermistion::select('routes')->whereIn('id',$array_id_per)->get()->toArray();
        $list = array();
        foreach ($data as $item) {
            array_push($list,$item['routes']);
        }
        if(Auth::user()->id == 1){  
           return $next($request);
        }else{   
        $post = substr($name_route_current, 0, 4);        
            if($post == 'post'){
                $end = substr($name_route_current, 4);
                $getend = 'get'.$end;
            }
        if(in_array($name_route_current, $list) || (isset($getend) && in_array($getend, $list))){
            return $next($request);
        }else{
            return redirect()->route('dashboard')->with(['flash_level' => 'bg-danger', 'flash_mesage' => 'Không đủ quyền để vào']);
        }
        }
    else:
        return $next($request);
    endif;
    }
}
