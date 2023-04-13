@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            レシピ一覧
        </h2>
    </x-slot>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-wrap m-4">
      
        
    　@foreach ($recipes as $recipe)    
      <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
        <a class="block relative h-48 rounded overflow-hidden">
          <img class="object-cover object-center w-full h-full block"  src="{{url('storage/images')}}/{{$recipe->image}}">
          
        </a>
        <div class="mt-4">
          <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">レシピ名</h3>  
          <h2 class="text-gray-900 title-font text-lg font-medium"><a href="{{ route('recipes.show',$recipe->id)}}">{{ $recipe->name }}</a></h2>
         
        </div>
      </div>
      @endforeach
      
      
    </div>
  </div>
</section>
</x-app-layout>