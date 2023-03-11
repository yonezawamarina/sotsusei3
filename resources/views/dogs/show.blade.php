<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        {{$dog->id}}
                          <div class="container px-5  mx-auto">
                        
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <dl>
                                  <dt>お名前</dt>
                                  <dd>{{$dog->name}}</dd>
                                  
                                  <dt>犬種</dt>
                                  <dd>{{$dog->dog_breed->name}}</dd>
                                  
                                  <dt>体重</dt>
                                  <dd>{{$dog->weight}}kg</dd>
                                  
                                  <dt>性別</dt>
                                  <dd>{{["男の子","女の子"][$dog->gender]}}</dd>
                                  
                                   <dt>ライフステージ</dt>
                                  <dd>{{$dog->life_stage->name}}</dd>
                                  
                                  <dt>年齢</dt>
                                  <dd>{{$dog->age}}歳</dd>
                                  
                                  <dt>1日に必要な摂取カロリー</dt>
                                  <dd>{{$dog->calorie}}</dd>
                              </dl>   
                                
                        
                        
                            <div class="flex flex-col justify-center items-center">
                            　　<form method='get' action={{route('dogs.edit',['id' => $dog->id])}}>
                                    <div class="p-2 w-full">
                                      <button class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg ">編集する</button>
                                    </div>
                                 </form>
                                  
                                <form id='delete_{{$dog->id}}'class="  class="my-4" method='post' action={{route('dogs.destroy',['id' => $dog->id])}}>
                                    @csrf
                                　　<div class="p-2 w-full">
                                      <a href="#" data-id="{{ $dog->id }}" onclick="deletePost(this)" class=" text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">削除する</a>     
                                    </div>
                                </form>
                            </div>
                            
                          </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

          
          <!-- 確認メッセージ -->
          <script>
          function deletePost(e){
           'use strict'
           if(confirm('本当に削除していいですか？')){
           document.getElementById('delete_' + e.dataset.id).submit()
           }
          }
          </script>
