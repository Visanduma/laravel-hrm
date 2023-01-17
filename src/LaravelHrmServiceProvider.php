<?php

namespace Visanduma\LaravelHrm;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Visanduma\LaravelHrm\Commands\LaravelHrmCommand;

class LaravelHrmServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-hrm')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-hrm_table')
            ->hasCommand(LaravelHrmCommand::class);
    }
}
