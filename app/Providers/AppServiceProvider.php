<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Auth;
use App\Models\Group;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //jika user login sebagai
        Blade::if('user_group', function ($group_name) {
            $group = Group::where('name',$group_name)->first();

            if(Auth::check())
            {
                if(Auth::user()->group_id == $group->id)
                {
                    return true;
                }
            }
            

            return false;
        });

        //jika user memiliki akses $permission name
        Blade::if('has_permission', function ($array_permission=null) {
            
            if(Auth::check()):
                if(isset($array_permission))
                {
                    foreach($array_permission as $ap)
                    {
                        if(Auth::user()->hasPermission($ap)){
                            return true;
                        }  
                    }
                }

                return false;
            endif;

            return false;
        });


        //iss roott
        Blade::if('is_root', function () {
            if(Auth::check()):
                if(Auth::user()->isRootLevel())
                {
                    return true;
                }
                return false;
            endif;

            return false;
        });
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
}
