<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeCategories();
        $this->composeSidebars();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeCategories() 
    {
        view()->composer('frontend.app', View\FooterCategory::class);
    }

    public function composeSidebars() 
    {
        view()->composer('frontend.sidebar', View\SidebarProducts::class);
    }
}
