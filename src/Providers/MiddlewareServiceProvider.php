<?php namespace Eyeweb\MissionControl\Providers;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

/**
 * Class MiddlewareServiceProvider
 * @package Eyeweb\MissionControl\Providers
 */
class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $middleware = [];

    /**
     * @var array
     */
    protected $middlewareGroups = [];

    /**
     * @var array
     */
    protected $routedMiddleware = [
        'urlredirects' => \Eyeweb\MissionControl\Modules\UrlRedirects\Middleware\UrlRedirect::class,
        'auth.admin' => \Eyeweb\MissionControl\Modules\Admingroups\Middleware\Admin::class,
        'auth.dev' => \Eyeweb\MissionControl\Modules\Admingroups\Middleware\Dev::class,
        'auth.permissions' => \Eyeweb\MissionControl\Modules\Admingroups\Middleware\Permissions::class,
        'auth.user' => \Eyeweb\MissionControl\Modules\Users\Middleware\User::class,
        'staging' => \Eyeweb\MissionControl\Modules\Staging\Middleware\Staging::class,
        'language' => \Eyeweb\MissionControl\Modules\Languages\Middleware\Language::class,
    ];

    /**
     * @param Router $router
     * @param Kernel $kernel
     */
    public function boot(Router $router, Kernel $kernel)
    {

        //global middleware
        if(count($this->middleware) > 0) {
            foreach($this->middleware as $middleware) {
                $kernel->pushMiddleware($middleware);
            }
        }

        // grouped middleware
        if(count($this->middlewareGroups) > 0) {
            foreach($this->middlewareGroups as $middlewareGroupName => $middlewares) {
                foreach($middlewares as $middleware) {
                    $router->pushMiddlewareToGroup($middlewareGroupName, $middleware);
                }
            }
        }

        // route middleware
        if(count($this->routedMiddleware) > 0) {
            foreach($this->routedMiddleware as $name => $class) {
                $router->aliasMiddleware($name, $class);
            }
        }
    }
}
