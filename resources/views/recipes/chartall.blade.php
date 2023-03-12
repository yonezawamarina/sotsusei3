
ドッグID取得:{{$se_dog_id}}</br>
ドッグフードID取得:{{$se_dogfood_id}}</br> 
レシピID取得:{{$se_recipe_id}} 








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
        
        
        
        
        
        
        <script>
            
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