<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dog;
use App\Models\DogFood;
use App\Models\DogBreed;
use App\Models\LifeStage;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;//セッション追加




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//カテゴリー一覧画面
    {
        
        $categories = Category::all();
        
         return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // $category= Category::find($id);
        
        // $recipes = $category->recipes;
    
        
        // $data = [
        //     'category' => $category,
        //     'recipes' => $recipes,
        // ];
        
        // return view('recipes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function gorecipe(Request $request,$id)
    {
        
    }
    
    
    
      public function chartall(Request $request,$id)
    {
        $recipes= Recipe::find($id);
         $dog = Dog::find($id);
         $dog_food_id = $request->dog_food_id;
        
        
        if($dog_food_id){
            $dog_food = DogFood::find($dog_food_id);
        }else{
            $dog_food = new DogFood;
        }
        $intake = $request->intake ?? 0;
        
         
         
        
        //セッション取得
        $se_dog_id = $request->session()->get('dog_id'); 
        $se_dogfood_id = $request->session()->get('dogfood_id'); 
        $se_recipe_id = $request->session()->get('recipes_id'); 
        $se_dog_calorie = $request->session()->get('dogcalorie');
        $se_intake = $request->session()->get('intake');
        $se_dogfood_kl = $request->session()->get('dogfood_kl');
        $se_dogcalorie = $request->session()->get('dogcalorie');
        
        $protein = ((($se_dogcalorie-$se_dogfood_kl)/$recipes->kilocalorie)*$recipes->protein);
        $carbohydrate = ((($se_dogcalorie-$se_dogfood_kl)/$recipes->kilocalorie)*$recipes->carbohydrate);
        $fat = ((($se_dogcalorie-$se_dogfood_kl)/$recipes->kilocalorie)*$recipes->fat);
        $vitamin = ((($se_dogcalorie-$se_dogfood_kl)/$recipes->kilocalorie)*$recipes->vitamin);
        
        $data = [
            "protein" => $protein,
            "carbohydrate" => $carbohydrate,
            "fat" => $fat,
            "vitamin" => $vitamin,
            "intake" => $intake,
              "dog" => $dog,
              "dog_food" => $dog_food,
             'se_dogfood_kl' => $se_dogfood_kl,
             'se_intake' => $se_intake,
             'se_dog_calorie' => $se_dog_calorie,
             'se_dog_id' => $se_dog_id,
             'se_dogfood_id' => $se_dogfood_id,
             'se_recipe_id' => $se_recipe_id,
             'recipes' => $recipes,
             'se_dogcalorie' => $se_dogcalorie
        ];
        return view('recipes.chartall',$data);
    }
    
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
