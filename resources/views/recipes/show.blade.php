@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            レシピ詳細
        </h2>
        
       
         <!--作るボタン-->
    <div class="flex justify-end">
        <form method="GET" action="{{ route('recipes.gorecipe',['id'=>$recipe->id])}}">  
           <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" type="submit">作る</button>
        </form>
    </div>
        
        
    </x-slot>
    
    
    
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-18 md:flex-row flex-col items-center">
    
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 inline-block border-b-4 border-orange-500 w-3/4">{{$recipe->name}}</h1>
      <img class="object-cover object-center rounded"  src="{{url('storage/images')}}/{{$recipe->image}}" width="500px">
    </div>
    
    
    
    
  
    
   <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <div class="container px-5 py-24 mx-auto">
        <table class="table-auto w-full text-left whitespace-no-wrap border-gray-100 rounded-lg shadow-lg" style="border-collapse: collapse;">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-500 text-sm shadow-lg bg-amber-500  rounded-tl rounded-bl">材料名</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-500 text-sm shadow-lg bg-amber-500">分量</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($materials as $material)   
            <tr>
              <td>{{ $material->name }}</td>
              <td>{{(session('dog')->calorie - session('intake')/100*session('dogfood')->kilocalorie)/100*($material->amount)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  
  
    
<section class="text-gray-600 body-font">
    残り{{session('dog')->calorie - session('intake')/100*session('dogfood')->kilocalorie}}カロリー<br/>
    <div>
      <div class="flex rounded-md shadow-sm mt-6">
        <input type="number" id="inputIntake" name="intake" value="" 
        class="py-3 px-4 block  border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-yellow-500 focus:ring-yellow-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">カロリー
      </div>
      <button type="submit" class=" text-white bg-yellow-500 border-0 py-1 px-8 h-12 focus:outline-none hover:bg-yellow-300 rounded text-lg">送信</button>
    </div>  
</section>
  
  
  
  
  
  
</section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    






</x-app-layout>





  
<script>
  const form = document.querySelector('form');
  form.addEventListener('submit', function(e) {
    e.preventDefault(); // フォームの通常の送信を防止
    const input = document.querySelector('#inputIntake');
    const value = input.value; // 入力された値を取得
    const td = document.createElement('td');
    td.textContent = value; // テーブルの<td></td>に入力された値を表示
    const tr = document.querySelector('tr:last-child'); // 最後の行を取得
    tr.lastElementChild.appendChild(td); // 最後の行の最後のセルに<td>を追加
    input.value = ''; // 入力欄を空にする
  });
</script>

