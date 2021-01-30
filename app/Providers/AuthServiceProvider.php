<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         Gate::define('isSuperadmin', function($user) {
            return $user->roles->first()->name == 'superadmin';
         });
        
         Gate::define('isTranslator', function($user) {
             return $user->roles->first()->name == 'translator';
         });  

         Gate::define('isUniversity', function($user) {
             return $user->roles->first()->name == 'university';
         });   

         Gate::define('isAbiturient', function($user) {
             return $user->roles->first()->name == 'abiturient';
         }); 

         Gate::define('isBossmanager', function($user) {
             return $user->roles->first()->name == 'managers_boss';
         });      

         Gate::define('isManager', function($user) {
             return $user->roles->first()->name == 'manager';
         });       
    }
}
