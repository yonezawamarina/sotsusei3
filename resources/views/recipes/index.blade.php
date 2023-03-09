@vite(['resources/css/app.css', 'resources/js/app.js'])



<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">レシピカテゴリー検索</h1>
    </div>
    
     <div class="flex flex-wrap -m-4">
    
     @foreach ($categories as $category)
      <div class="xl:w-1/3 md:w-1/2 p-4">
        <div class="border border-gray-200 p-6 rounded-lg">
          <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <h2 class="text-lg text-gray-900 font-medium title-font mb-2"> <a href="{{ route('recipes.show',['id'=>$category->id])}}">{{ $category->name }}</a></br></h2>
        </div>
      </div>
      @endforeach
      

    </div>
  </div>
</section>