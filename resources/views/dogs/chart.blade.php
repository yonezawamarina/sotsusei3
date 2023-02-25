<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            わんちゃん情報
        </h2>
    </x-slot>
    
         <div>{{$dog->name}}</div>
         
    
    
         <!---必要カロリー表示--->
          <div class="relative">
            <label for="breed" class="leading-7 text-sm text-gray-600">必要カロリー</label>
            
            @foreach ($dog_foods as $dog_food)
            　<div>{{ $dog_food->calorie }}</div>
            @endforeach
         </div>
         
         <!---フード選択--->
         <form action=>
         <div class="p-2 w-full">
          <div class="relative">
            <label for="breed" class="leading-7 text-sm text-gray-600">ドッグフード選択</label>
            　<select name="dog_breed_id">
                    @foreach ($dog_foods as $dog_food)
                    <option value="{{ $dog_food->id }}">{{ $dog_food->name}}</option>
                    @endforeach
                </select> 　　　
            <!--<input type="text" id="breed" name="breed" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">-->
          </div>
         </div>
        </form>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!--ここからグラフ-->
    <!--<div class="py-12">-->
    <!--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">-->
    <!--        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">-->
    <!--            <div class="p-6 text-gray-900 dark:text-gray-100">-->
                
    <!--            <canvas id="mychart"></canvas>    -->
                    
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!---->
<script>
   
        
        const ctx = document.getElementById("mychart").getContext("2d");
        const myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["タンパク質", "ビタミン", "脂質"],
                datasets: [
                    {
                        label: "# of Votes",
                        data: @json($data),
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
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