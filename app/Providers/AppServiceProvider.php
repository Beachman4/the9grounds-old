<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->BladeDirectiveHTML();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function BladeDirectiveHTML()
    {
        Blade::directive('html', function ($exp) {
            return "<?php echo htmlspecialchars_decode(stripslashes($exp)); ?>";
        });
    }
}
