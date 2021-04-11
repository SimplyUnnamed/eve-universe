<?php

namespace SimplyUnnamed\Seat\EveUniverse;

use Seat\Services\AbstractSeatPlugin;

class EveUniverseServiceProvider extends AbstractSeatPlugin
{

    public function boot(){
        $this->add_routes();

        $this->add_views();
    }

    public function register(){
        $this->mergeConfigFrom(
            __DIR__.'/Config/eveuniverse.config.php',
            'eveuniverse'
        );
    }

    //Register views
    public function add_views(){
        $this->loadViewsFrom(__DIR__.'/resources/views', 'eveuniverse');
    }


    //register routes
    public function add_routes(){
        if(!$this->app->routesAreCached()){
            include __DIR__.'/Http/routes.php';
        }
    }

    public function getVersion(): string{
        return "1.0";
    }

    public function getName(): string
    {
        return "Eve Universe";
    }

    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/SimplyUnnamed/eve-universe';
    }

    public function getPackagistPackageName(): string
    {
        return 'Eve-Universe';
    }

    public function getPackagistVendorName(): string
    {
        return 'SimplyUnnamed';
    }
}