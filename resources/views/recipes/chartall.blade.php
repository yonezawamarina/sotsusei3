
ドッグID取得:{{$se_dog_id}}</br>
ドッグフードID取得:{{$se_dogfood_id}}</br> 
レシピID取得:{{$se_recipe_id}} </br>
ドッグフード量：{{$se_intake}}</br>
1日の必要カロリー：{{$se_dogcalorie}}</br>
ドッグフードでの摂取カロリー：{{$se_dogfood_kl}}</br>
ドッグフードを食べたうえでの残カロリー：{{$se_dogcalorie-$se_dogfood_kl}}</br>
選択したレシピのビタミン量/100ｇ{{$recipes->vitamin}}</br>
★選択したレシピを残カロリー分食べた時のビタミン摂取量：{{(($se_dogcalorie-$se_dogfood_kl)/$recipes->kilocalorie)*$recipes->vitamin}}</br>
@json($dog_food->getGraphData($intake))</br>
@json($dog->getRequiredGraphData())</br>
{{$intake}}</br>
{{$recipes->recipeprotein}}</br>
★選択したレシピを残カロリー分食べた時の各栄養素摂取量</br>
protein{{$protein}}</br>
vitamin{{$vitamin}}</br>
fat{{$fat}}</br>
carbohydrate{{$carbohydrate}}



@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         {{$dog->name}} のごはん一覧
        </h2>
    </x-slot>

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <p>ドッグフード</p>
      <p class="mb-8 leading-relaxed">{{$se_dog_id}}：カロリー</p>
      
      
      <p>レシピ</p>
      <p class="mb-8 leading-relaxed">{{$se_recipe_id}}：カロリー</p>
      
      
     
      
      
      
      
     
      <!--レシピ追加ボタン-->
      <div class="flex justify-end">
         <form method="GET" action="{{ route('recipes.index')}}">
           <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" type="submit">レシピ追加</button>
        </form>
      </div>
      
      
      
      
           
     </div>          
      
      
       
                       
        
                        
                                                    
                                                  
                                                   
    
      

    </div>
  </div>
  
  
   <!--グラフ表示-->            　
                           　      <div class="w-1/2">
                                       <div class="py-12">
                                            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                                                <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/2">
                                                    <div style="width:1300px;height:400px;"　class="p-6 text-gray-900 dark:text-gray-100">
                                                    
                                                    <canvas id="mychart"></canvas>    
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
</section>




  

    
    
    
     <script>
        
     　//グラフ表示
                const ctx = document.getElementById("mychart").getContext("2d");
                const myChart = new Chart(ctx, {
                    type: "radar",
                    data: {
                        labels: ["タンパク質", "ビタミン", "脂質", "炭水化物"],
                        datasets: [
                          
                              {
                                label: "レシピを食べた時の摂取量",
                                data: [{{$protein}},{{$carbohydrate}},{{$fat}},{{$vitamin}}],
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
                                    "rgba(255,255,0,0.2)",
                                ],
                                borderWidth: 1,
                            },
                            
                            
                            {
                                label: "ドッグフードを食べた時の摂取量",
                                data: [1,2,3,4],
                                backgroundColor: [
                                    "rgba(400,80,10,0.2)",
                                ],
                                borderColor: [
                                    "rgba(400,80,10,0.2)",
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