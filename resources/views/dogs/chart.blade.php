<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ドッグフード
        </h2>
    </x-slot>
    
    
    
    <div class="flex justify-center">
    <div class="w-full sm:w-2/3 lg:w-1/2">
         
        <div>{{$dog->name}}</div> 
        <div>{{$dog->calorie}}</div> 
        
        
         
              
         <div class="p-2 w-full">
          <div class="relative">
            <label for="breed" class="leading-7 text-sm text-gray-600">ドッグフード選択</label>
            <form method="get"  action="/dogs/{{$dog->id}}/chart">
                
                <select name="dog_food_id" id="dog_food_id" onchange="setInitialIntake({{$dog->calorie}}/this.value)">
                        @foreach ($dog_foods as $df)
                         <option value="{{ $df->id }}"{{ $dog_food && $df->id == $dog_food->id ? ' selected' : '' }}>{{ $df->name}}</option>
                        @endforeach
                </select></br>
                  
                
                <label for="inputIntake" class="leading-7 text-sm text-gray-600">摂取フード量</label>
                
                <div>
                  <label for="hs-trailing-button-add-on" class="sr-only">Label</label>
                  <div class="flex rounded-md shadow-sm">
                    <input type="number" id="inputIntake" name="intake" value="{{$intake}}" class="py-3 px-4 block  border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-yellow-500 focus:ring-yellow-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                    <button  class="py-3 px-4 inline-flex flex-shrink-0 justify-center items-center gap-2 rounded-r-md border border-transparent font-semibold bg-yellow-500 text-white hover:bg-yellow-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-all text-sm">
                      送信
                    </button>
                  </div>
                </div>
             </form>
           </div>
           
           
           <img src="/storage/images/{{$dog_food->image}}">
           
            
            </div>
    </div>
</div>
           　
           　
           　
           　
           　
           <div class="flex justify-center">　
           　 <div class"=w-5/12 mr-4">
               <p>選択したフードの栄養素(100ｇあたり)</p>
                   <table>
                            <thead>
                                    <td class="bg-yellow-500 text-white">たんぱく質</td>
                                    <td class="bg-yellow-500 text-white">ビタミン</td>
                                    <td class="bg-yellow-500 text-white">炭水化物</td>
                                    <td class="bg-yellow-500 text-white">脂質</td>
                                <tr>
                                    <th>{{ $dog_food->protein }}</th>
                                    <th>{{ $dog_food->vitamin }}</th>
                                    <th>{{ $dog_food->carbohydrate}}</th>
                                    <th>{{ $dog_food->fat }}</th>
                                </tr>
                            </thead>
                    </table>
                </div>
                <div class="w-5/12 ml-4">
                <p>摂取できる栄養素量</p>
                   <table>
                            <thead>
                                    <td class="bg-yellow-500 text-white">たんぱく質</td>
                                    <td class="bg-yellow-500 text-white">ビタミン</td>
                                    <td class="bg-yellow-500 text-white">炭水化物</td>
                                    <td class="bg-yellow-500 text-white">脂質</td>
                                <tr  class="bg-white">
                                    <th>{{ $dog_food->proteinAmount($intake) }}</th>
                                    <th>{{ $dog_food->vitaminAmount($intake) }}</th>
                                    <th>{{ $dog_food->carbohydrateAmount($intake)}}</th>
                                    <th>{{ $dog_food->fatAmount($intake)}}</th>
                                </tr>
                            </thead>
                    </table>
            　</div>
            </div>
                   
                   <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div style="width:500px;height:500px;"　class="p-6 text-gray-900 dark:text-gray-100">
                                
                                <canvas id="mychart"></canvas>    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                   
            <script>

               function setInitialIntake(value){
                   document.querySelector("#inputIntake").value = parseInt(value);
               }
               
               
               
               
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
             
             
             
        
        
        
    
                        
                
               
       
           
         
          
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
