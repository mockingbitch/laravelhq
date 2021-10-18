<?php

namespace App\Providers;

use App\Repositories\MenuRepository;
//use App\Repositories\Menu\MenuRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }
    public function register()
    {
//        $this->app->bind(MenuRepository::class,MenuRepositoryInterface::class);
    }
}
