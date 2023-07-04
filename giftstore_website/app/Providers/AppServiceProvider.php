<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\services\ProductController as ServicesProductController;
use App\Http\Controllers\services\CategoryController as ServicesCategoryController;
use App\Http\Controllers\services\TypeCategoryController as ServicesTypeCategoryController;
use App\Models\TypeCategory;
use App\Models\Category;

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
            //Get all type category
            $CategoryController = new ServicesCategoryController();
            $data_category = $CategoryController->getAllCategoryByStatus('enabled');
            $allCategories = [];
            if($data_category['data']!=null)
                $allCategories = $data_category['data']->collection->take(6);
            
            //Get all type category
            $typeCategories = TypeCategory::where('status','enabled')
            ->whereHas('categories')
            ->get();

            //Get category by type category 
            $typeCategories = TypeCategory::whereHas('categories')->get();
            $categoriesByType = [];
            foreach ($typeCategories as $typeCategory) {
                $categories = Category::where('id_type_category', $typeCategory->id_type_category)
                    ->where('status', 'enabled')
                    ->get();
                $categoriesByType[$typeCategory->id_type_category] = $categories;
            }

            //Get all type category doesn't exist category
            $getAllTypeCategories = TypeCategory::where('status','enabled')
            ->whereDoesntHave('categories')
            ->get();
            $view->with([
                'typeCategories' => $typeCategories,
                'categoriesByType' => $categoriesByType,
                'getAllTypeCategories' => $getAllTypeCategories,
                'allCategories' => $allCategories,
            ]);
        });
    }
}
