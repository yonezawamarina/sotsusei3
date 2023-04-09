<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            HOME
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                         　　　　 <!--<div class="lg:w-2/3 w-full mx-auto overflow-auto">-->
                                 <section class=" text-gray-600 body-font">
                                          <div class="container px-5 py-4 mx-auto">
                                            
                                            
                                            <div class="flex flex-wrap sm:-m-3 -mx-4 -mb-10 -mt-4">
                                            　@foreach($dogs as $dog)</br>
                                            　<!--画像-->
                                              <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                                                  
                                                  
                                                <div class="rounded-lg h-64 overflow-hidden">
                                                  <img class="object-cover object-center w-full h-full block"  src="{{url('/storage/images')}}/{{$dog->image}}">
                                                </div>
                                                　<!--名前-->
                                                 <div class="flex">
                                                    <h2 class="text-xl font-medium title-font text-gray-900 mt-5 ">{{$dog->name}}</h2>
                                                    　<!--ドッグフード詳細-->
                                                  　 <button onclick="window.location.href='{{route('dogs.chart',['id'=>$dog->id])}}'" class="p-2">
                                                       <!--<i class="fa-sharp fa-solid fa-utensils w-300 h-110" style="color: #ff7f7f;"></i>-->
                                                        <i class="fa fa-utensils fa-2x" style="color: #ff7f7f;"></i>
                                                     </button>
                                                    <!--プロフ詳細-->
                                                    <button onclick="window.location.href='{{ route('dogs.show', ['id' => $dog->id]) }}'" class="p-2">
                                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                      </svg>
                                                    </button>
                                                    
                                                  </div>
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
        
        
        
       
        <!--fontawsome読み込みCDN-->
        <script src="https://kit.fontawesome.com/e10693a884.js" crossorigin="anonymous"></script>
        
  
  

        
        
