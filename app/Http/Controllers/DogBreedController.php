<?php

namespace App\Http\Controllers;

use App\Models\DogBreed;
use Illuminate\Http\Request;

class DogBreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        
      
        return view('dogs.index', compact('dogs'));
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
     * @param  \App\Models\DogBreed  $dogBreed
     * @return \Illuminate\Http\Response
     */
    public function show(DogBreed $dogBreed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DogBreed  $dogBreed
     * @return \Illuminate\Http\Response
     */
    public function edit(DogBreed $dogBreed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DogBreed  $dogBreed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DogBreed $dogBreed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DogBreed  $dogBreed
     * @return \Illuminate\Http\Response
     */
    public function destroy(DogBreed $dogBreed)
    {
        //
    }
}
