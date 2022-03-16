<?php

namespace Vanguard\Dashboard;

use Route;
use Illuminate\Database\Eloquent\Factory;
use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Dashboard extends Plugin
{
    /**
     * A sidebar item for the plugin.
     * @return Item|null
     */
    public function sidebar()
    {
        return Item::create(__('Agent Dashboard'))
        ->route('agent.dashboard')
        ->icon('fas fa-user')
        ->active("dashboard*");    
    }

    /**
     * Register plugin services required.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->mapRoutes();

        $this->registerFactories();
    }

    /**
     * Register plugin configuration files.
     */
    protected function registerConfig()
    {
        $configPath = __DIR__.'/../config/config.php';

        $this->publishes([$configPath => config_path('dashboard.php')], 'config');

        $this->mergeConfigFrom($configPath, 'dashboard');
    }

    /**
     * Register plugin views.
     *
     * @return void
     */
    protected function registerViews()
    {
        $viewsPath = __DIR__.'/../resources/views';

        $this->publishes([
            $viewsPath => resource_path('views/plugins/dashboard')
        ], 'views');

        $this->loadViewsFrom($viewsPath, 'dashboard');
    }

    /**
     * Map all plugin related routes.
     */
    protected function mapRoutes()
    {
        $this->mapWebRoutes();

        if ($this->app['config']->get('auth.expose_api')) {
            $this->mapApiRoutes();
        }
    }

    /**
     * Map web plugin related routes.
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'namespace' => 'Vanguard\Dashboard\Http\Controllers\Web',
            'middleware' => 'web',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Map API plugin related routes.
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'namespace' => 'Vanguard\Dashboard\Http\Controllers\Api',
            'middleware' => 'api',
            'prefix' => 'api',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        });
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function registerFactories()
    {
        if (! $this->app->environment('production') && $this->app->runningInConsole()) {
            $this->app->make(Factory::class)->load(__DIR__ . '/../database/factories');
        }
    }
}
