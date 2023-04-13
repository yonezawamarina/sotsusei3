<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            
            
          
           {{session('dog')->name}}のごはん一覧
        </h2>
        </h2>
        <div class="flex justify-end">
         <form method="GET" action="{{ route('category.index') }}">
           <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" type="submit">レシピ検索</button>
        </form>
        </div>
    </x-slot>
   
    
            
            
        
        
        <section class="text-gray-600 body-font overflow-hidden">
          <div class="container px-5 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
             
                                    <div class="w-1/2 flex flex-col w-full mt-10">
                                                  <div class="relative mb-4">
                                                        <label for="full-name" class="leading-7 text-sm text-gray-600">ドッグフード選択</label>
                                                            <form method="get"  action="{{route('dogs.chart',$dog->id)}}">
                                                                    <select name="dog_food_id" id="dog_food_id" onchange="setInitialIntake({{$dog->calorie}}/this.value)"  class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                                        @foreach ($dog_foods as $df)
                                                                         <option value="{{ $df->id }}"{{ $dog_food && $df->id == $dog_food->id ? ' selected' : '' }}>{{ $df->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                                    <div class="flex item-center justify-center"><!--セレクトボックスと画像横並び-->
                                                                        <img src="{{url('/storage/images')}}/{{$dog_food->image}}" id="dog_food_image" width="100px">
                                                                    </div>
                                                                    
                                                                     <!--フード量選択-->
                                                                 <div class="flex flex-col items-center justify-center mt-4">
                                                                    <label for="inputIntake" class="leading-7 text-sm text-gray-600">ドッグフード量選択</label>
                                                                    <div class="flex">
                                                                         <button id="all" type="button" class="flex mx-auto mr-2 text-white shadow-lg bg-amber-500 shadow-amber-500/50 border-0 py-2 px-8 h-12 focus:outline-none hover:bg-yellow-300 rounded text-lg">全量</button>
                                                                         <button id="half" type="button"  class="flex mx-auto mr-2 text-white shadow-lg bg-amber-500 shadow-amber-500/50 border-0 py-2 px-8 h-12 focus:outline-none hover:bg-yellow-300 rounded text-lg">1/2</button>
                                                                         <button id="onethird" type="button" class="flex mx-auto mr-2 text-white shadow-lg bg-amber-500 shadow-amber-500/50 border-0 py-2 px-8 h-12 focus:outline-none hover:bg-yellow-300 rounded text-lg">1/3</button>
                                                                    </div>
                                                                 </div>
                                                                
                                                              
                                                              
                                                                
                                                                  <div class="flex rounded-md shadow-sm py-12">
                                                                    <input type="number" id="inputIntake" name="intake" value="{{$intake}}" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                                                    <button type="submit" class="py-3 px-4 inline-flex flex-shrink-0 justify-center items-center gap-2 rounded-r-md border border-transparent font-semibold shadow-lg bg-amber-500 shadow-amber-500/50 text-white  text-sm">
                                                                      グラフ表示
                                                                    </button>
                                                                  </div>
                                                                
                                                                
                                                                
                                                           </form>   
                                                           
                                                   </div>   
                                           </div>
                                                                                        
                                
                                            
                                           
                                  
          
          
                                          <div class="lg:w-1/2 w-full lg:pl-10 lg:mt-6 lg:mt-0"><!--ここから-->
                                                  <div class="py-12">
                                                        <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                                                            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                                                                <div style="width:1300px;height:400px;"　class="p-6 text-gray-900 dark:text-gray-100">
                                                                
                                                                <canvas id="mychart"></canvas>    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                          </div><!--ここまで-->
                              
                </div>
              </div>
        </section>
                    
        
        
        
        
            
            <script>
              const inuptIntake = document.getElementById('inputIntake');
                let originalIntake; // 選択変更したときの元の摂取量

                // ドッグフード選択で動的に必要量を表示
                function setInitialIntake(value){
                    inuptIntake.value = parseInt(value);
                    originalIntake = value;
                }

                // 全量ボタンが押されたとき
                const button1 = document.getElementById('all')
                button1.addEventListener('click', function () {
                    // インプットタグに全量（元の摂取量）を表示
                    inputIntake.value = originalIntake;
                })

                // 1/2ボタンがクリックされたときの処理
                const button2 = document.getElementById('half');
                button2.addEventListener('click', function() {                    
                    // インプットタグに半分の量を表示
                    inputIntake.value = parseInt(originalIntake / 2);
                });

                // 1/3ボタンがクリックされたときの処理
                const button3 = document.getElementById('onethird');
                button3.addEventListener('click', function() {                  
                    // インプットタグに結果を表示
                    inputIntake.value = parseInt(originalIntake / 3);
                });
                 
                     
               
               
    // 積み上げデータの作成
    let dog_food_data = @json($dog_food->getGraphData($intake));
    let stackedData = [...dog_food_data];
    let dog_data = @json($dog->getRequiredGraphData());
    let recipes = @json(session("recipes")); // session("recipes")で値を取得
    
    for(let i = 0; i < recipes.length; i++){
    stackedData[0] += recipes[i]["protein"]
    stackedData[1] += recipes[i]["fat"];
    stackedData[2] += recipes[i]["vitamin"];
    stackedData[3] += recipes[i]["carbohydrate"];
}

    // グラフ表示
    const ctx = document.getElementById("mychart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "radar",
        data: {
            labels: ["タンパク質", "ビタミン", "脂質", "炭水化物"],
            datasets: [
            {
                    label: "ドッグフードとレシピを食べた時の摂取量",
                    data: stackedData,
                    backgroundColor: "rgba(0, 255, 0, 0.5)",
                    borderColor: "rgba(0, 255, 0, 0.5)",
                    borderWidth: 1,
                    stack: "Stack 0",
                },
                 
               
                {
                    label: "必要栄養素量",
                    data: dog_data,
                    backgroundColor: "rgba(255, 68, 0, 0.4)",
                    borderColor: "rgba(255, 68, 0, 0.4)",
                    borderWidth: 1,
                    stack: "Stack 0",
                },
                 {
                    label: "ドッグフードを食べた時の摂取量",
                    data: dog_food_data,
                    backgroundColor: "rgba(255,0,77,0.5)",
                    borderColor: "rgba(255,255,77,0.5)",
                    borderWidth: 1,
                    stack: "Stack 0",
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
             
             
             
        
        
        
    
                        
                
               
       
           
         
          
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    