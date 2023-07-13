<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PlanTutor;
use App\Models\Tutor;



class PlanVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario = auth()->user();
        $tutor=Tutor::where('user_id',$usuario->id)->first();
        $data=PlanTutor::where('tutor_id',$tutor->id)->where("activo",true)->first();
        if (empty($data)) {
            return redirect()->route('plan');
        }
        return $next($request);
    }
}
