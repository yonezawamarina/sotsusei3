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
  <div class="container mx-auto flex px-5 py-2 md:flex-row flex-col items-center">
    
    
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded"  src="{{url('storage/images')}}/{{$recipe->image}}" width="500px">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
     
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 inline-block border-b-4 border-orange-500 w-3/4">{{$recipe->name}}</h1>
  

      <p class="border-orange-500 inline-block border-b text-xl">材料 (100ｇあたり)</p>

       <div class="flex flex-col md:w-1/2 md:pl-12">
      <nav class="flex flex-wrap list-none -mb-1">
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
        <li class="lg:w-1/3 mb-1 w-1/2">
          <a class="text-gray-600 hover:text-gray-800">{{$recipe->material}}</a>
        </li>
      </nav>
    </div>
     
      <p class="border-orange-500 inline-block border-b text-lg">作り方</p>
      
      <div style="display: flex; align-items: center;">
        <p class="leading-relaxed text-base" style="flex-grow: 1;">1.{{$recipe->process}}</p>
        <img class="object-cover object-center rounded" src="{{url('storage/images')}}/{{$recipe->image}}" width="100px" style="margin-left: 20px;">
      </div>
      
      <div style="display: flex; align-items: center; margin-top: 10px;">
      <p class="leading-relaxed text-base" style="flex-grow: 1;">1.{{$recipe->process}}</p>
      <img class="object-cover object-center rounded" src="{{url('storage/images')}}/{{$recipe->image}}" width="100px" style="margin-left: 20px;">
    </div>

      <div style="display: flex; align-items: center; margin-top: 10px;">
        <p class="leading-relaxed text-base" style="flex-grow: 1;">1.{{$recipe->process}}</p>
        <img class="object-cover object-center rounded" src="{{url('storage/images')}}/{{$recipe->image}}" width="100px" style="margin-left: 20px;">
      </div>

      <div style="display: flex; align-items: center;">
        <p class="leading-relaxed text-base" style="flex-grow: 1;">1.{{$recipe->process}}</p>
        <img class="object-cover object-center rounded" src="{{url('storage/images')}}/{{$recipe->image}}" width="100px" style="margin-left: 20px;">
      </div>
  
   </div>
  </div>
  
   
   
   
   

  <div class="container flex flex-wrap px-5 mx-auto items-center">
    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">コメント</h1>
      <p class="leading-relaxed text-base border-2 border-orange-500" style="border-style: double; border-width: 4px 0;">{{$recipe->co}}</p>
    </div>
  </div>
  
  <table>
  <tr>
    <th>列1</th>
    <th>列2</th>
    <th>列3</th>
  </tr>
  <tr>
    <td>行1, 列1</td>
    <td>行1, 列2</td>
    <td>行1, 列3</td>
  </tr>
  <tr>
    <td>行2, 列1</td>
    <td>行2, 列2</td>
    <td>行2, 列3</td>
  </tr>
</table>

  
</section>
</x-app-layout>




  <!--fontawsome読み込みCDN-->
  <script src="https://kit.fontawesome.com/e10693a884.js" crossorigin="anonymous"></script>