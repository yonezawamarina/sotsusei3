
ドッグID取得:{{$se_dog_id}}</br>
ドッグフードID取得:{{$se_dogfood_id}}</br> 
レシピID取得:{{$se_recipe_id}} </br>
ドッグフード量：{{$se_intake}}</br>
1日の必要カロリー：{{$se_dogcalorie}}</br>
ドッグフードでの摂取カロリー：{{$se_dogfood_kl}}</br>
ドッグフードを食べたうえでの残カロリー：{{$se_dogcalorie-$se_dogfood_kl}}</br>
選択したレシピのビタミン量/100ｇ{{$recipes->vitamin}}


@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             のごはん一覧
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
</section>
</x-app-layout>
　     