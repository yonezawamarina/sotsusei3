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

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $recipes = $category->recipes;
        return view('recipes.index', compact('recipes', 'category'));
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
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    
    
    
    public function show(Request $request, $id)//カテゴリー別のレシピ一覧
    {
        $category= Category::find($id);
        
        $recipes = $category->recipes;
    
        
        $data = [
            'category' => $category,
            'recipes' => $recipes,
        ];
        
        return view('recipes.show', $data);
    }
    
    
    public function gorecipe(Recipe $recipe, Request $request, $id)//レシピ詳細
    {
        $recipes= Recipe::find($id);
        
        // //セッションにrecipe->idを保存する　配列で！
        // // $array = ['recipe1' =>$recipes->id,'recipe2' =>'$recipes->id'];
        // $se_recipe_id = $request->session()->put('recipes_id', $recipes->id);
        // $recipes = $request->session()->get('recipes') ?? [];
        
        
        
        $data = [
            
            //  'se_recipe_id' => $se_recipe_id,
             'recipes' => $recipes,
        ];
        return view('recipes.gorecipe',$data);
        
    }
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
