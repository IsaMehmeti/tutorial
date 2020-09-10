<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Filter;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
            //   // $id = Auth::id();
            view()->composer('*', function($view) {
               $id = Auth::id();
               $filters = Filter::where('user_id' , $id)->get();
               $view->with(compact('filters'));  
               });
                // View::share('filter', Filter::where('user_id', $id)->get());
            //     View::share('filter', Filter::all()/*where('user_id', $id)->get()*/);
    }
}
