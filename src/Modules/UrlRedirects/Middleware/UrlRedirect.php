<?php namespace Eyeweb\MissionControl\Modules\UrlRedirects\Middleware;

use Closure, File;
use Eyeweb\MissionControl\Modules\UrlRedirects\Models\UrlRedirect as UrlRedirectModel;

/**
 * Class UrlRedirect
 * @package Eyeweb\MissionControl\Modules\UrlRedirects\Middleware
 */
class UrlRedirect
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if($urlredirect = UrlRedirectModel::where('from', request()->path())->first()) {
            return redirect()->to($urlredirect->to, 301);
        }

        return $next($request);
    }
}
