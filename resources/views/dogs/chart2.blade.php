<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            わんちゃん情報
        </h2>
    </x-slot>
    
        <h1>Selected Item</h1>
        <p>ID: {{ $dog_foods->id }}</p>
       
        
         <!--その犬の１日のカロリー摂取量を満たす為の、選択したフードのグラム数を求めたい-->
         <!--上記の数式　"$dog->calorie"　÷（割る）"選択したドッグフードのカロリdog_food->kilocalorieー"　×１００-->
         <!---->
    
    
    
         
         <!---フード選択--->
         
       
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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