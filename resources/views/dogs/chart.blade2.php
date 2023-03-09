<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ドッグフード
        </h2>
    </x-slot>
    
         
    
         
        <div>{{$dog->name}}</div> 
        <div>{{$dog->calorie}}</div> 
         
         
         
       

              
         <div class="p-2 w-full">
          <div class="relative">
            <label for="breed" class="leading-7 text-sm text-gray-600">ドッグフード選択</label>
            <form method="get"  action="/dogs/{{$dog->id}}/chart">
                
                  
               {{--  <select name="dog_food_id" id="dog_food_id">
                        @foreach ($dog_foods as $df)
                         <option value="{{ $df->id }}"{{ $dog_food && $df->id == $dog_food->id ? ' selected' : '' }}>{{ $df->name}}</option>
                        @endforeach
                </select> 
                  　　<p　id="calorie">Aaa</p>
                     <input type="number" name="intake"  id="intake" value="{{$intake}}" />--}}
                     
                    
                    
                    <select name="dog_food" id="dog_food">
                      @foreach ($dog_foods as $dogFood)
                        <option value="{{ $dogFood->id }}">{{ $dogFood->name }}</option>
                      @endforeach
                    </select>
                    <!--<input type="text" id="dog_food_kcal" name="kilocalorie" value="">-->

                    
                                        
                                     
                                     
                 
                     
                     
                
                 <button class=" text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
             </form>
           </div>
           
           
           
            
        
           
           
            <div>
                <p>摂取フード量: {{ $intake }} g</p>
            </div>
           　
           <div>選択したフードの栄養素(100ｇあたり)</div>
           <table>
                    <thead>
                            <td>たんぱく質</td>
                            <td>ビタミン</td>
                            <td>炭水化物</td>
                            <td>脂質</td>
                        <tr>
                            
                            <th>{{ $dog_food->protein }}</th>
                            <th>{{ $dog_food->vitamin }}</th>
                            <th>{{ $dog_food->carbohydrate}}</th>
                            <th>{{ $dog_food->fat }}</th>
                           
                        </tr>
                    </thead>
                </table>
                   
           
            
            <div>摂取できる栄養素量</div>
           <table>
                    <thead>
                            <td>たんぱく質</td>
                            <td>ビタミン</td>
                            <td>炭水化物</td>
                            <td>脂質</td>
                        <tr>
                            <th>{{ $dog_food->proteinAmount($intake) }}</th>
                            <th>{{ $dog_food->vitaminAmount($intake) }}</th>
                            <th>{{ $dog_food->carbohydrateAmount($intake)}}</th>
                            <th>{{ $dog_food->fatAmount($intake)}}</th>
                        </tr>
                    </thead>
            </table>
                   
                   <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                
                                <canvas id="mychart"></canvas>    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  
             
                  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>       
            <script>
　　　　　　
　　　
                    
                     $(document).ready(function() {
                        $('#dog_food').on('change', function() {
                          var dogFoodId = $(this).val();
                          $.ajax({
                            url: '/dog_foods/' + dogFoodId + '/kilocalorie',
                            type: 'GET',
                            dataType: 'json',
                            success: function(response) {
                              $('#kilocalorie').val(response.kilocalorie);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                              console.log(textStatus + ': ' + errorThrown);
                            }
                          });
                        });
                      });








           





              
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
             
             
             
        
        
        
    
                        
                
               
       
           
         
          
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
