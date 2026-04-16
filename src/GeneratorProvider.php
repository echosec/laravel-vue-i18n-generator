<?php namespace MartinLindhe\VueInternationalizationGenerator;

use Illuminate\Support\ServiceProvider;
use MartinLindhe\VueInternationalizationGenerator\Commands\GenerateInclude;

class GeneratorProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/vue-i18n-generator.php' => config_path('vue-i18n-generator.php'),
            ], 'vue-i18n-generator-config');

            $this->commands([
                GenerateInclude::class,
            ]);
        }
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/vue-i18n-generator.php',
            'vue-i18n-generator'
        );
    }
}
