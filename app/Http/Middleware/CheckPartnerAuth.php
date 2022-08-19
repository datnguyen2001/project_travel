<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPartnerAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check())
        {
            return redirect()->route('partner.login')->with(['alert'=>'danger', 'message' => 'Vui lòng đăng nhập để tiếp tục']);
        }
        if(Auth::user()['level'] != 'partner')
        {
            return redirect()->route('partner.login')->with(['alert'=>'danger', 'message' => 'Bạn không có quyền truy cập trang này']);
        }
        return $next($request);
    }
}
