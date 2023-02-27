<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            わんちゃん情報
        </h2>
    </x-slot>
    
         
        
        
         <!--その犬の１日のカロリー摂取量を満たす為の、選択したフードのグラム数を求めたい-->
         <!--上記の数式　"$dog->calorie"　÷（割る）"選択したドッグフードのカロリdog_food->kilocalorieー"　×１００-->
         <!---->
    
    
    
         
        <div>{{$dog->name}}</div> 
        <div>{{$dog->calorie}}</div> 
         
              
         <div class="p-2 w-full">
          <div class="relative">
            <label for="breed" class="leading-7 text-sm text-gray-600">ドッグフード選択</label>
            <form method="get"  action="/dogs/{{$dog->id}}/chart">
                　<select name="dog_food_id" id="dog_food_id">
                        @foreach ($dog_foods as $dog_food)
                        <option value="{{ $dog_food->id }}">{{ $dog_food->name}}</option>
                        @endforeach
                 </select> 
                 
                 <button class=" text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
             </form>
           </div>
           
       
        
        @if(request()->has('dog_food_id'))
            @php
                $dogfood = App\Models\DogFood::find(request()->input('dog_food_id'));
            @endphp
            @if($dogfood)
                 <table>
                    <thead>
                            <td>フード名</td>
                            <td>カロリー</td>
                            <td>たんぱく質</td>
                            <td>ビタミン</td>
                            <td>炭水化物</td>
                            <td>脂質</td>
                        <tr>
                            <th>{{ $dogfood->name }}</th>
                            <th>{{ $dogfood->kilocalorie }}</th>
                            <th>{{ $dogfood->protein }}</th>
                            <th>{{ $dogfood->vitamin }}</th>
                            <th>{{ $dogfood->carbohydrate }}</th>
                            <th>{{ $dogfood->fat }}</th>
                        </tr>
                    </thead>
                </table>
            @endif
        @endif
                        
                
               
       
           
         
          
         
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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

</x-app-layout>