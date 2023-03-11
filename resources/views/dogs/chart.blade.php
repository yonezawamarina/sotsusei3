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
                  
                
                <label for="breed" class="leading-7 text-sm text-gray-600">摂取フード量</label>
                <input id="inputIntake" type="number" name="intake"  value="{{$intake}}" class="mt-4" /> 
                <span>ｇ</span><!--追加-->
                <button class=" text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
             </form>
           </div>
           
           <img src="/storage/images/{{$dog_food->image}}">
           
            <div>
                <p>摂取フード量: {{ $intake }} g</p>
            </div>
            </div>
    </div>
</div>
           　
           　
           　
           　
           　
           <div class="flex justify-center">　
           　 <div class"=w-5/12 mr-4">
               <p>選択したフードの栄養素(100ｇあたり)</p>
                   <table>
                            <thead>
                                    <td>たんぱく質</td>
                                    <td>ビタミン</td>
                                    <td>炭水化物</td>
                                    <td>脂質</td>
                                <tr  class="bg-white">
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
                                    <td>たんぱく質</td>
                                    <td>ビタミン</td>
                                    <td>炭水化物</td>
                                    <td>脂質</td>
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
                                label: "# of Votes",
                                data: @json($dog_food->getGraphData($intake)),
                                backgroundColor: [
                                    "rgba(255, 99, 132, 0.2)",
                                    "rgba(54, 162, 235, 0.2)",
                                    "rgba(255, 206, 86, 0.2)",
                                    "rgba(75, 192, 192, 0.2)",
                                    "rgba(153, 102, 255, 0.2)",
                                    
                                ],
                                borderColor: [
                                    "rgba(255, 99, 132, 1)",
                                    "rgba(54, 162, 235, 1)",
                                    "rgba(255, 206, 86, 1)",
                                    "rgba(75, 192, 192, 1)",
                                    "rgba(153, 102, 255, 1)",
                                    
                                ],
                                borderWidth: 1,
                            },
                            
                            {
                                label: "# of Votes",
                                data: @json($dog->getRequiredGraphData()),
                                backgroundColor: [
                                    "rgba(255, 99, 132, 0.2)",
                                    "rgba(54, 162, 235, 0.2)",
                                    "rgba(255, 206, 86, 0.2)",
                                    "rgba(75, 192, 192, 0.2)",
                                    "rgba(153, 102, 255, 0.2)",
                                    
                                ],
                                borderColor: [
                                    "rgba(255, 99, 132, 1)",
                                    "rgba(54, 162, 235, 1)",
                                    "rgba(255, 206, 86, 1)",
                                    "rgba(75, 192, 192, 1)",
                                    "rgba(153, 102, 255, 1)",
                                    
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
             
             
             
        
        
        
    
                        
                
               
       
           
         
          
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
