<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\User;
class Checklog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function findIpInSession($ip,$user_name)
    {
        // Session::flush();
        // $test = array(
        //     "user_name"=>"probet",
        //     "level"=>2
        //     );
        // Session::put('ip',$test);
        
        if (Session::has($ip))
        {
             dd('hello');
            $value = Session::get($ip);
            if($value['user_name']==$user_name)
                if($value['level']==User::findLevelFromUserName($user_name))
                return true;
        }
        return false;
    
    }
    public function handle($request, Closure $next)
    {
        
        $value = Session::get(request()->ip());
        dd($value);
        if ($this->findIpInSession($request->ip(),$request->user_name)==false) {
            return redirect('/');
        }
        return $next($request);
    }
    
}
