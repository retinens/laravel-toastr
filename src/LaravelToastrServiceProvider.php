<?php

namespace Retinens\LaravelToastr;

use Illuminate\Support\Facades\Blade;
use Retinens\LaravelToastr\Http\Components\ToastrComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelToastrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-toastr')
            ->hasConfigFile("toastr")
            ->hasViews();

        Blade::component(ToastrComponent::class, 'toastr');

        $this->app->singleton('toastr', function () {
            return $this->app->make(LaravelToastr::class);
        });
    }
}
