<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Dog;
use App\Models\DogFood;
use App\Models\DogBreed;
use App\Models\LifeStage;
use App\Models\Recipe;
use Illuminate\Support\Facades\Session;//セッション追加


use Validator;  //この1行だけ追加！
use Illuminate\Http\Request;



class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     * 
     * 
     * 
    
     */
     
 

    
    public function index()
    {

      //自分のuser_idが付与されている投稿だけ取得する
        $dogs = Dog::where('user_id',Auth::id())->orderBy('created_at', 'asc')->paginate(30);
        return view('dogs.index', compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       $dog_foods = DogFood::get();
    
       
       $dog_breeds = DogBreed::get();
  
      
       $life_stages = LifeStage::get();
        // dd($life_stages);
    
       return view('dogs.create',['dog_breeds'=>$dog_breeds,'life_stages'=>$life_stages,'dog_foods'=>$dog_foods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        	  $dogs = new Dog;
        	  $dogs->name   = $request->name;
        	  $dogs->weight = $request->weight;
        	  $dogs->gender   = $request->gender;
        	  $dogs->age   = $request->age;
	          $dogs->user_id = Auth::id();//ここを追加
	          $dogs->dog_breed_id = $request->dog_breed_id;
	          $dogs->life_stage_id = $request->life_stage_id; 
	          
	          //画像登録のために追加//
	           if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('public/images', $filename);
                    $dogs->image = $filename;
                }
	              
	          
	          $dogs->save(); 
	          return redirect('/dogs');
 
    }

    

      public function show($id)
      {
          $dog = Dog::find($id);
          
          
          if($dog->gender === 0){
              $gender = '男の子';
              
          }else{
              
            $gender = '女の子';
          }
          
          return view('dogs.show',
          compact('dog','gender'));
          
      }
          
    //             }
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Dog  $dog
    //  * @return \Illuminate\Http\Response
    //  * 
    //  * 
    //  * 
    //  */
     
        public function edit($id)
      {
        
         $dog = Dog::find($id);
         
          return view('dogs.edit', compact('dog'));
         
     }



      public function update(Request $request, $id)
      {
        
         $dog = Dog::find($id);
         
          $dog->name   = $request->name;
      	  $dog->dog_breed->name = $request->dog_breed_id;
      	  $dog->weight = $request->weight;
      	  $dog->gender   = $request->gender;
      	  $dog->life_stage->id = $request->life_stage_id; 
          $dog->user_id = Auth::id();//ここを追加
          $dog->save(); 
        
          return to_route('dogs.index');
         
     }



      public function destroy($id)
      {
        
         $dog = Dog::find($id);
         $dog->delete();
      	  
         return to_route('dogs.index');
         
     }

     public function chart($id,Request $request)
     {
        
        
        //idから犬を取得
        $dog = Dog::find($id);
        
        //選択されたドッグフードを取得
        $dog_food_id = $request->dog_food_id;
        
        
        if($dog_food_id){
            $dog_food = DogFood::find($dog_food_id);
        }else{
            $dog_food = new DogFood;
        }
        
        
        $intake = $request->intake ?? 0;
        
        //ﾄﾞｯｸﾞﾌｰﾄﾞ全件取得(プルダウン用)
        $dog_foods = DogFood::get();
        
        $recipe = Recipe::all();
        
        
        //セッションに保存する
        $request->session()->put('dog' , $dog);
        $request->session()->put('dogfood' , $dog_food);
        $request->session()->put('intake', $intake);
        
        
        
        //ビューにデータを渡す
        $data = [
            "recipe" => $recipe,
            "dog" => $dog,
            "dog_food" => $dog_food,
            "dog_foods" => $dog_foods,
            "intake" => $intake,
            "recipe" => $recipe,
            
            ];
            
        return view('dogs.chart',$data);    
        
    }
        

     

      //自分のuser_idが付与されている投稿だけ取得する
        // $dogs = Dog::where('user_id',Auth::id())->orderBy('created_at', 'asc')->paginate(30);
       
       
        
        

}
