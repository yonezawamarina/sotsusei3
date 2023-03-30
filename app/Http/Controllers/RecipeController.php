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
    public function index(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
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
    
    
    
    public function show($id)//レシピ詳細
    {
        $recipe= Recipe::findOrFail($id);
        
    
        
        $data = [
            'recipe' => $recipe,
        ];
        
        return view('recipes.show', $data);
    }
    
    
    public function gorecipe($id)//レシピ詳細
    {
        
        
        
            $recipe = Recipe::findOrFail($id);//これ使う
            
            $recipes = session('recipes') ?? [];//
             
            $recipes[] = $recipe; 
        
        
            // $recipes = Recipe::all();
            $dog_id = session('dog')->id;
            
            
            
            //セッションに保存する
            session()->put('recipes' , $recipes);
            
            
            $data = [
                 'recipe' => $recipe, 
                 'recipes' => $recipes,
                 'dog_id' => $dog_id
            ];
            // return view('recipes.gorecipe',$data);
            return redirect()->route('dogs.chart' , $dog_id);
                
        
        
       
        
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
