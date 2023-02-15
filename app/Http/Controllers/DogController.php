<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Dog;

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
     
       public function inputform()
    {
        // $data = ['msg'=>"テキストボックスに入力してください。"];
        // dd($data);
        return view('dogs.dog');
    }

    public function formpost(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'breed'=>$request->breed,
            'weight'=>$request->weight,
            'gender'=>$request->gender,
            'fix'=>$request->fix,
            'age'=>$request->age,
            'food'=>$request->food,
            'daykcl'=>$request->weight * $request->age
            
        ];
        // dd($data);
        return view('dogs/dogkcl', $data);
    }
     
     
     
     
     
     
    public function index()
    {
    //   return view('dogs.index');//
    
      //自分のuser_idが付与されている投稿だけ取得する
        $dogs = Dog::where('user_id',Auth::id())->orderBy('created_at', 'asc')->paginate(3);
      
        return view('dogs.index', compact('dogs'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dogs.dog'); //
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
        // dd($request);
        
        // Dog::create([
        //     'name' => $request->name,
        //     'user_id' => $request->user_id
        //     'breed' => $request->breed,
        //     'weight' => $request->weight,
        //     'gender' => $request->gender,
        //     'fix' => $request->fix,
        //     'age' => $request->age,
        //     'food' => $request->food,
        // ]);
        
        // return to_route('dogs.index');
        
        	  $dogs = new Dog;
        	  $dogs->name   = $request->name;
        	  $dogs->breed = $request->breed;
        	  $dogs->weight = $request->weight;
        	  $dogs->gender   = $request->gender;
        	  $dogs->fix   = $request->fix;
        	  $dogs->age   = $request->age;
        	  $dogs->food   = $request->food;
        	  $dogs->food   = $request->food;
	          $dogs->user_id = Auth::id();//ここを追加
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
              $fix = 'している';
              
          }else{
              
            $fix = 'していない';
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
}
