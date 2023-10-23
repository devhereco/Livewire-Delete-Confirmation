<?php

namespace devhereco\LivewireConfirmDelete;

use Illuminate\Support\ServiceProvider;

/**
 * Class InvoiceServiceProvider
 */
class ConfirmDeleteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
    }

    /**
     * Register the Invoices routes.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'ConfirmDelete');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'ConfirmDelete');
    }
}