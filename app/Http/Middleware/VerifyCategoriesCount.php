<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class VerifyCategoriesCount
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
        if (Category::all()->count() === 0) {
            return redirect(route('categories.create'))
                ->withErrors(['title' => '', 'msg1' => 'You need to add categories to be able to create a post']);
        }

        return $next($request);
    }
}
