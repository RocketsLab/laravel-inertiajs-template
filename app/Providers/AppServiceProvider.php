<?php /** @noinspection PhpHierarchyChecksInspection */

namespace App\Providers;

use App\Http\Inertia\InertiaPaginator;
use Carbon\CarbonImmutable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use function foo\func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInertia();

        $this->registerPaginator();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Date::use(CarbonImmutable::class);
    }

    protected function registerInertia()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function() {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email
                    ] : null,
                 ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                    'warning' => Session::get('warning'),
                    'info' => Session::get('info')
                ];
            },
            'errors' => function() {
                return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages() :
                    (object) [];
            }
        ]);
    }

    protected function registerPaginator()
    {
        $this->app->bind(LengthAwarePaginator::class, function ($app, $values) {
            return new InertiaPaginator(...array_values($values));
        });
    }
}
