<?php

namespace Bantenprov\PerKKBSmaMa;

use Illuminate\Support\ServiceProvider;
use Bantenprov\PerKKBSmaMa\Console\Commands\PerKKBSmaMaCommand;

/**
 * The PerKKBSmaMaServiceProvider class
 *
 * @package Bantenprov\PerKKBSmaMa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PerKKBSmaMaServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('persentase-kondisi-kelas-baik-sma-ma', function ($app) {
            return new PerKKBSmaMa;
        });

        $this->app->singleton('command.persentase-kondisi-kelas-baik-sma-ma', function ($app) {
            return new PerKKBSmaMaCommand;
        });

        $this->commands('command.persentase-kondisi-kelas-baik-sma-ma');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'persentase-kondisi-kelas-baik-sma-ma',
            'command.persentase-kondisi-kelas-baik-sma-ma',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('persentase-kondisi-kelas-baik-sma-ma.php');

        $this->mergeConfigFrom($packageConfigPath, 'persentase-kondisi-kelas-baik-sma-ma');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'persentase-kondisi-kelas-baik-sma-ma');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/persentase-kondisi-kelas-baik-sma-ma'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'persentase-kondisi-kelas-baik-sma-ma');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/persentase-kondisi-kelas-baik-sma-ma'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'persentase-kondisi-kelas-baik-sma-ma-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'persentase-kondisi-kelas-baik-sma-ma-public');
    }
}
