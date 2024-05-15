<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
/* use Laravel\Cashier\Cashier;
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
/*         Cashier::ignoreMigrations();
 */    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('formatNumber', function ($expression) {
            return "<?php echo format_number{$expression}; ?>";
        });
    }
}
