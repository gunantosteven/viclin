<?php namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = $request->user();
		if ($user && $user->role == 'owner')
		{
			return $next($request);
		}
		else if ($user && $user->role == 'admin')
		{
			return redirect('admin/dashboard');
		}

		return redirect('/');
	}

}
