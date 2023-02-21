<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            HOME
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                         　　　　 <!--<div class="lg:w-2/3 w-full mx-auto overflow-auto">-->
                                 <section class="text-gray-600 body-font">
                                          <div class="container px-5 py-24 mx-auto">
                                            <div class="flex flex-col">
                                              <div class="h-1 bg-gray-200 rounded overflow-hidden">
                                                <div class="w-24 h-full bg-yellow-500"></div>
                                              </div>
                                              <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                                                <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">わんちゃん</h1>
                                              </div>
                                            </div>
                                            
                                            
                                            <div class="flex flex-wrap sm:-m-3 -mx-4 -mb-10 -mt-4">
                                            　@foreach($dogs as $dog)</br>
                                              <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                                                <div class="rounded-lg h-64 overflow-hidden">
                                                  <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1203x503">
                                                </div>
                                                <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{$dog->name}}</h2><!--名前-->
                                                <a class='text-blue-500' href="{{route('dogs.show',['id'=>$dog->id])}}">詳細</a>
                                              
                                              </div>
                                              @endforeach
                                            </div>
                                          </div>
                                    </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
        
        
        
        
        
        
        
<!--<section class="text-gray-600 body-font">-->
<!--  <div class="container px-5 py-24 mx-auto">-->
<!--    <div class="flex flex-col">-->
<!--      <div class="h-1 bg-gray-200 rounded overflow-hidden">-->
<!--        <div class="w-24 h-full bg-yellow-500"></div>-->
<!--      </div>-->
<!--      <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">-->
<!--        <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Space The Final Frontier</h1>-->
<!--        <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">Street art subway tile salvia four dollar toast bitters selfies quinoa yuccie synth meditation iPhone intelligentsia prism tofu. Viral gochujang bitters dreamcatcher.</p>-->
<!--      </div>-->
<!--    </div>-->
    
    
<!--    <div class="flex flex-wrap sm:-m-3 -mx-4 -mb-10 -mt-4">-->
<!--    　@foreach($dogs as $dog)</br>-->
<!--      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">-->
<!--        <div class="rounded-lg h-64 overflow-hidden">-->
<!--          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1203x503">-->
<!--        </div>-->
<!--        <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{$dog->name}}</h2><!--名前-->-->
<!--        <a class="text-yellow-500 inline-flex items-center mt-3">Learn More-->
<!--        <a class='text-blue-500' href="{{route('dogs.show',['id'=>$dog->id])}}">詳細</a>-->
<!--          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">-->
<!--            <path d="M5 12h14M12 5l7 7-7 7"></path>-->
<!--          </svg>-->
<!--        </a>-->
<!--      </div>-->
<!--      @endforeach-->
<!--    </div>-->
     
    
<!--  </div>-->
<!--</section>-->



















<!--<x-app-layout>-->
<!--    <x-slot name="header">-->
<!--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">-->
<!--            わんちゃん情報-->
<!--        </h2>-->
<!--    </x-slot>-->

<!--    <div class="py-12">-->
<!--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">-->
<!--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">-->
<!--                <div class="p-6 text-gray-900 dark:text-gray-100">-->
                
                
                      
<!--                       <a href="{{route('dogs.create')}}" class="text-pink-500">新規登録</a>-->
                
                                        　　　　
                                        　　　　 <!--<div class="lg:w-2/3 w-full mx-auto overflow-auto">-->
<!--                              <table class="table-auto w-full text-left whitespace-no-wrap">-->
<!--                                <thead>-->
<!--                                  <tr>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">飼い主ID</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">お名前</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">犬種</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">体重</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">性別</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ライフステージ</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">年齢</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ドックフード</th>-->
<!--                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">必要カロリー</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>-->
<!--                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">グラフ</th>-->
<!--                                  </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                　@foreach($dogs as $dog)</br>-->
<!--                                  <tr>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->id}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->user_id}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->name}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->breed}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->weight}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->gender}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->fix}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->age}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->food}}</td>-->
<!--                                     <td class="border-t-2 border-gray-200 px-4 py-3">{{$dog->daykcl}}</td>-->
<!--                                    <td class="border-t-2 border-gray-200 px-4 py-3"><a class='text-blue-500' href="{{route('dogs.show',['id'=>$dog->id])}}">詳細</a></td>-->
<!--                                    </td>-->
<!--                                  </tr>-->
<!--                                  @endforeach-->
<!--                                </tbody>-->
<!--                              </table>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </x-app-layout>-->
        