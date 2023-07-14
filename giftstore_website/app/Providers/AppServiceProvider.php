<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TypeCategory;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function($view){
            $cartCount = 0;
            if (Auth::check()) {
                $userId = Auth::user()->id_user;
                $member = Member::where('id_user', $userId)->first();
                if ($member) {
                    $cartCount = $member->carts()->sum('quantity');
                }
            }

            $typeCategories =  TypeCategory::where('status','enabled')->get();
            $categories = Category::where('status', 'enabled')->take(6)->get();
    
            $categoriesByType = [];
            foreach ($typeCategories as $typeCategory) {
                $categoriesByType[$typeCategory->id_type_category] = Category::where('id_type_category', $typeCategory->id_type_category)->get();
            }

            $view->with([
                'typeCategories' => $typeCategories,
                'categories' => $categories,
                'categoriesByType' => $categoriesByType,
                'cartCount' => $cartCount,
            ]);           
        });
    }
}
