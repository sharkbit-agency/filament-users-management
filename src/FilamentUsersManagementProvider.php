<?php

namespace sharkBitAgency\FilamentUsersManagement;

use Filament\PluginServiceProvider;
use sharkBitAgency\FilamentUsersManagement\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;


class FilamentUsersManagementProvider extends PluginServiceProvider
{
    public static string $name = 'filament-users-management';

    protected array $resources = [
        UserResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-users-management');
    }

    public function boot(): void
    {
        parent::boot();

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-users-management');

        $this->publishes([
            __DIR__ . '/../config' => config_path(),
        ], 'filament-users-management-config');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/filament-users-management'),
        ], 'filament-users-management-translations');
    }
}
