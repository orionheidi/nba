<?php

namespace App\Http\Middleware;

use Closure;

class ForbiddenComments
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
        $forbidden_words = [
            'hate',
            'stupid',
            'idiot',
        ];

        foreach ($forbidden_words as $word) {
            if(strstr($request->content, $word)) {
                session()->flash(
                    'message',
                    'This is really not apropriate language!Shame on you!'
                );
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
