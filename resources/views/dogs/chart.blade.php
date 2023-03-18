<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{$dog->name}}のドッグフード詳細
        </h2>
        <div class="flex justify-end">
         <form method="GET" action="{{ route('recipes.index') }}">
           <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" type="submit">レシピ検索</button>
        </form>
        </div>
    </x-slot>
   
    
    <div class="flex item-center">
    
   
                    <div class="w-1/2">
                        
                              <form method="get"  action="{{route('dogs.chart',$dog->id)}}">
                
                                    <!--ドッグフード選択セレクトボックス-->
                                    <div class="flex item-center "><!--セレクトボックスと画像横並び-->
                                            <div class="mt-8">
                                                <label for="breed" class="leading-7 text-sm text-gray-600">ドッグフード選択</label>
                                                <select name="dog_food_id" id="dog_food_id" onchange="setInitialIntake({{$dog->calorie}}/this.value)"  class="py-3 px-4 pr-9 block  border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                    @foreach ($dog_foods as $df)
                                                     <option value="{{ $df->id }}"{{ $dog_food && $df->id == $dog_food->id ? ' selected' : '' }}>{{ $df->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--ドッグフードimage-->
                                            <img src="{{url('/storage/images')}}/{{$dog_food->image}}" id="dog_food_image" width="100px">
                                    </div>
                                    
                                    <!--フード量選択-->
                                    <label for="inputIntake" class="leading-7 text-sm text-gray-600">ドッグフード量選択</label>
                                    <div class="flex">
                                        <button id="all" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-300 rounded text-lg">全量</button>
                                        <button id="half" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-300 rounded text-lg">1/2</button>
                                        <button id="onethird" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-300 rounded text-lg">1/3</button>
                                    </div>
                                    
                                    
                                    <!--摂取フード量-->
                                        <div>
                                          <label for="hs-trailing-button-add-on" class="sr-only">Label</label>
                                          <div class="flex rounded-md shadow-sm">
                                            <input type="number" id="inputIntake" name="intake" value="{{$intake}}" class="py-3 px-4 block  border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-yellow-500 focus:ring-yellow-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"><span>g</span>
                                            
                                          </div>
                                        </div>          
                              </form>
                    </div>
                
                        
                        
                           
                            <!--グラフ表示-->            　
                           　      <div class="w-1/2">
                                       <div class="py-12">
                                            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                                                <div class="bg-yellow-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/2">
                                                    <div style="width:1300px;height:400px;"　class="p-6 text-gray-900 dark:text-gray-100">
                                                    
                                                    <canvas id="mychart"></canvas>    
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
               </div>          

            <script>
                
                // ドッグフード選択で動的に必要量を表示  
               function setInitialIntake(value){
                   document.querySelector("#inputIntake").value = parseInt(value);
               }
               
               
               //1/2ボタンを押した時
                  const button2 = document.getElementById('half');
               // ボタンがクリックされたときの処理
                  button2.addEventListener('click', function() {
                  // インプットタグの要素を取得
                  const input = document.getElementById('inputIntake');
                
                  // インプットタグの値を取得して数値に変換
                  const inputValue = Number(input.value);
                
                  // 値を半分にする
                  
                 const halfValue = inputValue /2;
                
                  // インプットタグに結果を表示
                  input.value = parseInt(halfValue);
                });
                
                
                 //1/3ボタンを押した時
                  const button3 = document.getElementById('onethird');
               // ボタンがクリックされたときの処理
                  button3.addEventListener('click', function() {
                  // インプットタグの要素を取得
                  const input3 = document.getElementById('inputIntake');
                
                  // インプットタグの値を取得して数値に変換
                  const inputValue3 = Number(input3.value);
                
                  // 値を半分にする
                  const halfValue3 = inputValue3 / 3;
                  
                  // インプットタグに結果を表示
                  input3.value = parseInt(halfValue3);
                });
                 
                 
                 
                 
                     
               
               
               
               
               
               
               
               　//グラフ表示
                const ctx = document.getElementById("mychart").getContext("2d");
                const myChart = new Chart(ctx, {
                    type: "radar",
                    data: {
                        labels: ["タンパク質", "ビタミン", "脂質", "炭水化物"],
                        datasets: [
                            {
                                label: "ドッグフードを食べた時の摂取量",
                                data: @json($dog_food->getGraphData($intake)),
                                backgroundColor: [
                                    "rgba(255,69,0,0.3)",
                                    
                                    
                                    
                                ],
                                borderColor: [
                                    "rgba(255,182,193,0.8)",
                                    
                                    
                                ],
                                borderWidth: 1,
                            },
                            
                            {
                                label: "必要栄養素量",
                                data: @json($dog->getRequiredGraphData()),
                                backgroundColor: [
                                    
                                    "rgba(255,255,0,0.2)",
                                    
                                    
                                ],
                                borderColor: [
                                    
                                    "rgba(255,255,0,0,2)",
                                    
                                    
                                ],
                                borderWidth: 1,
                            },
                            
                            
                            
                            
                            
                            
                        ],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                });
        </script>
                    
            
            
            
    </x-app-layout>         
             
             
             
        
        
        
    
                        
                
               
       
           
         
          
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
