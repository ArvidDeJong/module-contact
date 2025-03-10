<?php

namespace Darvis\ModuleContact;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Console\Command;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Configuratie samenvoegen
        $this->mergeConfigFrom(
            __DIR__ . '/config/module_contact.php',
            'module_contact'
        );

        // Registreer commando's
        $this->registerCommands();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Routes laden
        $this->loadRoutes();

        // Views laden
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'module-contact');

        // Vertalingen laden
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'module-contact');

        // Migraties laden
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Assets publiceren
        $this->publishResources();

        // Livewire componenten registreren
        $this->registerLivewireComponents();
    }

    /**
     * Laad de routes voor de module.
     */
    protected function loadRoutes(): void
    {
        // Laad de routes direct zonder extra prefix, omdat de routes in web.php al een /cms prefix hebben
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    /**
     * Publiceer resources voor de module.
     */
    protected function publishResources(): void
    {
        // Config publiceren
        $this->publishes([
            __DIR__ . '/config/module_contact.php' => config_path('module_contact.php'),
        ], 'module-contact-config');

        // Views publiceren
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/module-contact'),
        ], 'module-contact-views');

        // Assets publiceren
        $this->publishes([
            __DIR__ . '/resources/assets' => public_path('vendor/module-contact'),
        ], 'module-contact-assets');
    }

    /**
     * Registreer Livewire componenten.
     */
    protected function registerLivewireComponents(): void
    {
        $livewireComponents = [
            'module-contact-list' => \Darvis\ModuleContact\Livewire\ContactList::class,
            'module-contact-create' => \Darvis\ModuleContact\Livewire\ContactCreate::class,
            'module-contact-update' => \Darvis\ModuleContact\Livewire\ContactUpdate::class,
            'module-contact-read' => \Darvis\ModuleContact\Livewire\ContactRead::class,
            'module-contact-upload' => \Darvis\ModuleContact\Livewire\ContactUpload::class,
            'module-contact-settings' => \Darvis\ModuleContact\Livewire\ContactSettings::class,
            'module-contact-list-row' => \Darvis\ModuleContact\Livewire\ContactListRow::class,
            'module-contact-button-email' => \Darvis\ModuleContact\Livewire\ContactButtonEmail::class,
        ];

        foreach ($livewireComponents as $alias => $class) {
            Livewire::component($alias, $class);
        }
    }

    /**
     * Registreer commando's voor de module.
     */
    protected function registerCommands(): void
    {
        $this->commands([
            \Darvis\ModuleContact\Console\Commands\PublishContactConfig::class,
        ]);
    }
}
