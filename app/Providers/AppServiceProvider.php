<?php

namespace App\Providers;
use App\Models\StatusPermohonan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Observers\StatusPermohonanObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        StatusPermohonan::observe(StatusPermohonanObserver::class);
        View::composer('layouts.sidebar',function($view){
        $user = Auth::user();
        $userid = $user->email;
        $menudinamis = DB::select("SELECT * FROM dbFlMenuWeb WHERE USERID = ? ORDER BY L1", [$userid]);
            $view->with('menudinamis', $menudinamis);
        });
    }
}
