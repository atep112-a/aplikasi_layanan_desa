<?php
namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Mendefinisikan guard untuk admin
        Auth::extend('admin', function ($app, $name, array $config) {
            return new \Illuminate\Auth\SessionGuard($name, Auth::createUserProvider($config['provider']), $app['session.store']);
        });

        // Atau jika menggunakan driver khusus
        Auth::viaRequest('admin', function ($request) {
            return Admin::where('email', $request->email)->first();
        });
    }
}
