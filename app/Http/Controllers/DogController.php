<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Dog;
use App\Models\DogFood;
use App\Models\DogBreed;
use App\Models\LifeStage;



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
     
    //   public function inputform()
    // {
    //     // $data = ['msg'=>"テキストボックスに入力してください。"];
    //     // dd($data);
    //     return view('dogs.dog');
    // }

    public function daykcl(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'weight'=>$request->weight,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'dog_breed_id'=>$request->dog_breed_id,
            'life_stage_id'=>$request->life_stage_id,
            
        ];
      
        return view('dogs/daykcl', $data);
    }
     
     
     
     
     
     
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
	          $dogs->save(); 
	          return redirect('/');
 
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
        
        //追加
        // $dog_food_name = DogFood::findOrFail($dog_food_name)->name;
        $dog_food_protein = DogFood::findOrFail($dog_food_id)->protein;
        $dog_food_vitamin = DogFood::findOrFail($dog_food_id)->vitamin;
        $dog_food_fat = DogFood::findOrFail($dog_food_id)->fat;
        // $dog_food_carbonhydrate = DogFood::findOrFail($dog_food_id)->carbonhydrate;
        $dog_food_carbohydrate = DogFood::findOrFail($dog_food_id)->carbohydrate;
        $added_foods = $request->input('added_foods') ?? 0;
        
        
        $protein_amount = $dog_food_protein * ($added_foods/100);
        $vitamin_amount = $dog_food_vitamin * ($added_foods/100);
        $carbohydrate_amount = $dog_food_carbohydrate * ($added_foods/100);
        $fat_amount = $dog_food_fat * ($added_foods/100);
        
        
        
        // dd($dog_food_id);
        if($dog_food_id){
            $dog_food = DogFood::find($dog_food_id);
        }else{
            $dog_food = null;
        }
        
        
        //ﾄﾞｯｸﾞﾌｰﾄﾞ全件取得(プルダウン用)
        $dog_foods = DogFood::get();
        
        // $amount = $request->input('amount');
        // $result = ($amount/100)*3;
        
        //ビューにデータを渡す
        $data = [
            
            "dog" => $dog,
            "dog_food" => $dog_food,
            "dog_foods" => $dog_foods,
            'dog_food_protein' => $dog_food_protein,
            // 'dog_food_name' => $dog_food_name,
            'dog_food_vitamin' => $dog_food_vitamin,
            'dog_food_fat' => $dog_food_fat,
            // 'dog_food_kilocalorie' => $dog_food_kilocalorie,
            'dog_food_carbohydrate' => $dog_food_carbohydrate,
            'added_foods' => $added_foods,
            'dog_food_id' => $request->input('dog_food_id'),
            'protein_amount' => $protein_amount,
            'vitamin_amount' => $vitamin_amount,
            'fat_amount' => $fat_amount,
            'carbohydrate_amount' => $carbohydrate_amount,
            'protein_amount' => $protein_amount,
            'vitamin_amount' => $vitamin_amount
            // "result" => $result
            
            ];
            
        return view('dogs.chart',$data);    
        
    }
        

     
        
    
        
       
    
   
       
        
        

      //自分のuser_idが付与されている投稿だけ取得する
        // $dogs = Dog::where('user_id',Auth::id())->orderBy('created_at', 'asc')->paginate(30);
       
       
        
        
        
        // return view('dogs.chart', [
        // 'dog'=> $dog,
        // 'data' => $dog->test()
        // ],);
        
        // return view('dogs.chart',['dog_foods'=>$dog_foods]);
        
        
    




}
