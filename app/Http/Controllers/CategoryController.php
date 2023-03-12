<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function index()
    {
        
        $categories = Category::all();
        
         return view('recipes.index', ['categories' => $categories]);
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
        $category= Category::find($id);
        
        $recipes = $category->recipes;
    
        
        $data = [
            'category' => $category,
            'recipes' => $recipes,
        ];
        
        return view('recipes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function gorecipe(Request $request,$id)
    {
        $recipes= Recipe::find($id);
        
        //セッションにrecipe->idを保存する　配列で！
        // $array = ['recipe1' =>$recipes->id,'recipe2' =>'$recipes->id'];
        $se_recipe_id = $request->session()->put('recipes_id', $recipes->id);
        
        
        $data = [
             'recipes' => $recipes,
        ];
        return view('recipes.gorecipe',$data);
    }
    
    
      public function chartall(Request $request,$id)
    {
        $recipes= Recipe::find($id);
        
        //セッション取得
        $se_dog_id = $request->session()->get('dog_id'); 
        $se_dogfood_id = $request->session()->get('dogfood_id'); 
        $se_recipe_id = $request->session()->get('recipes_id'); 
        
        $data = [
             'se_dog_id' => $se_dog_id,
             'se_dogfood_id' => $se_dogfood_id,
             'se_recipe_id' => $se_recipe_id,
             'recipes' => $recipes,
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
