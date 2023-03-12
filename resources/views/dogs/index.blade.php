<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            HOME
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                         　　　　 <!--<div class="lg:w-2/3 w-full mx-auto overflow-auto">-->
                                 <section class=" text-gray-600 body-font">
                                          <div class="container px-5 py-4 mx-auto">
                                            <div class="flex flex-col">
                                              <div class="h-1 bg-gray-200 rounded overflow-hidden">
                                                <div class="w-24 h-full bg-yellow-500"></div>
                                              </div>
                                              <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                                                <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">HOME</h1>
                                              </div>
                                            </div>
                                            
                                            
                                            <div class="flex flex-wrap sm:-m-3 -mx-4 -mb-10 -mt-4">
                                            　@foreach($dogs as $dog)</br>
                                              <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                                                <div class="rounded-lg h-64 overflow-hidden">
                                                  <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1203x503">
                                                </div>
                                                <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{$dog->name}}</h2>
                                                <a class='text-blue-500' href="{{route('dogs.show',['id'=>$dog->id])}}">詳細</a></br>
                                                <a class='text-blue-500' href="{{route('dogs.chart',['id'=>$dog->id])}}">グラフ情報へ</a></br>
                                              </div>
                                              @endforeach
                                            </div>
                                            
                                          </div>
                                    </section>
                            </div>
                        </div>
                    </div>
                </div>
            
        </x-app-layout>
        
        
        
        
        
        
        
