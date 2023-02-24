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
            // 'breed'=>$request->breed,
            'weight'=>$request->weight,
            'gender'=>$request->gender,
            // 'fix'=>$request->fix,
            'age'=>$request->age,
            // 'food'=>$request->food,
            // 'daycalorie'=>round(pow(pow(pow($request->weight,3),0.5),0.5)*70),
            'dog_breed_id'=>$request->dog_breed_id,
            'life_stage_id'=>$request->life_stage_id,
            // 'dog_food_id'=>$request->dog_food_id
            
        ];
        // dd($data);
        
    
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
       
    //   $dog_breeds = DogBreed::get();
    // //   dd($dog_breeds);
    
    // //   return view('dogs.create',['dogs_breeds'=>$dogs_breeds]);
       
       
       
    // 　$lifestages = LifeStage::get();
    //     // dd($life_stages);
    
    //     return view('dogs.create',['dog_breeds'=>$dog_breeds,'life_stages'=>$life_stages]);
        // return view('dogs.create',['dogs'=>$dogs,'dogfoods'=>$dogfoods]);
    // 
    
    
    
    
    
       
       $dog_breeds = DogBreed::get();
    //   dd($dog_breeds);
    
    //   return view('dogs.create',['dogs_breeds'=>$dogs_breeds]);
       
       
       
        $life_stages = LifeStage::get();
        // dd($life_stages);
    
        return view('dogs.create',['dog_breeds'=>$dog_breeds,'life_stages'=>$life_stages]);
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
        // 	  dd($dogs);
        	  $dogs->name   = $request->name;
        	  $dogs->weight = $request->weight;
        	  $dogs->gender   = $request->gender;
        	  $dogs->age   = $request->age;
        // 	  $dogs->daycalorie   = $request->daycalorie;
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
          
          
 
      if($dog->fix === 0){
            $fix = '生後4か月までの幼犬';
          }elseif($dog->fix === 1){
            $fix = '生後4か月から1年までの幼犬';
          }elseif($dog->fix === 2){
            $fix = '避妊・去勢済みの成犬';
          }elseif($dog->fix === 3){
            $fix = '避妊・去勢なしの成犬';
          }elseif($dog->fix === 4){
            $fix = '7歳以上で避妊・去勢済みの中高齢犬';
          }elseif($dog->fix === 5){    
            $fix = '7歳以上で避妊・去勢なしの中高齢犬';
          }elseif($dog->fix === 6){   
            $fix = '肥満傾向の成犬';
          }
          
    
          return view('dogs.show',
          compact('dog','gender','fix'));
          
      }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */
     
        public function edit($id)
      {
        
         $dog = Dog::find($id);
         
           return view('dogs.edit', compact('dog'));
         
     }



      public function update(Request $request, $id)
      {
        
         $dog = Dog::find($id);
         
          $dog->name   = $request->name;
      	  $dog->breed = $request->breed;
      	  $dog->weight = $request->weight;
      	  $dog->gender   = $request->gender;
      	  $dog->fix   = $request->fix;
      	  $dog->age   = $request->age;
      	  $dog->food   = $request->food;
      	  $dog->daycalorie   = $request->daycalorie;
      	 // dd($dog->daykcl);
         
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






}
