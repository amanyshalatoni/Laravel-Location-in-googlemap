<?php

namespace App\Http\Middleware;

use Closure;

class ClientRole
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
        if(\Auth::check()) {    
            $user_id = $request->user()->id;
            $isclient=\DB::table("client")->where("user_id",$user_id)->count()>0;
            if(!$isclient){
                \Session::flash("msg","e: الرجاء التأكد من أنك مسجل كعميل");
                return redirect("/home");
            }
        }
        return $next($request);
    }
}
