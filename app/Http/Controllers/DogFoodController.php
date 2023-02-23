<?php

namespace App\Http\Controllers;

use App\Models\DogFood;
use Illuminate\Http\Request;

class DogFoodController extends Controller
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
     * @param  \App\Models\DogFood  $dogFood
     * @return \Illuminate\Http\Response
     */
    public function show(DogFood $dogFood)
    {
          return view('dogfoods/show',['dogfood' => $dogfood]);      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DogFood  $dogFood
     * @return \Illuminate\Http\Response
     */
    public function edit(DogFood $dogFood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DogFood  $dogFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DogFood $dogFood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DogFood  $dogFood
     * @return \Illuminate\Http\Response
     */
    public function destroy(DogFood $dogFood)
    {
        //
    }
}
