@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            レシピカテゴリー
           
        </h2>
    </x-slot>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">レシピカテゴリー選択</h1>
    </div>
    
     <div class="flex flex-wrap -m-4">
    
     @foreach ($categories as $category)
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="border border-gray-200 p-6 rounded-lg shadow-lg bg-amber-500 shadow-amber-500/50">
          <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-100 text-gray-500 mb-4 ">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-2"> <a href="{{ route('recipes.index',['category_id'=>$category->id])}}">{{ $category->name }}</a></br></h2>
        </div>
      </div>
      @endforeach
      

    </div>
  </div>
</section>

 </x-app-layout>