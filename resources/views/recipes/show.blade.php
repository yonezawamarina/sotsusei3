@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">レシピ詳細</h2>
            
         <!--作るボタン-->
    <div class="flex justify-end">
        <form method="GET" action="{{ route('recipes.gorecipe',['id'=>$recipe->id])}}">  
           <button class="flex mx-auto text-gray-500 bg-sky-200 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" type="submit">作る</button>
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
     <form>
      <!--<div class="p-2 sm:w-1/2 w-full">-->
        <div class="inline-block border-b-4 border-orange-500  rounded flex p-4 items-center">
          <span class="title-font sm:text-3xl">残り{{session('dog')->calorie - session('intake')/100*session('dogfood')->kilocalorie}}カロリー</span>
        </div>
      <!--</div>-->
      
      
     <div class="text-gray-600 body-font">
            <div class="flex rounded-md shadow-sm py-12">
              <input type="number" id="inputIntake" name="intake" value="" class="px-4 block w-full border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="カロリー">
              <button type="submit" class="py-3 px-4 inline-flex flex-shrink-0 justify-center items-center gap-2 rounded-r-md border border-transparent font-semibold shadow-lg bg-yellow-500 shadow-amber-500/50 text-white hover:bg-yellow-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring--500 transition-all text-sm">
                材料表示
              </button>
            </div>
      </div>
      
      <div class="container px-5  mx-auto">
        
        <table class="table-auto w-full text-left whitespace-no-wrap border-sky-300 rounded-md  shadow-lg" style="width:600px">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-500 text-sm shadow-lg bg-yellow-500  rounded-tl rounded-bl">材料名</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-500 text-sm shadow-lg bg-yellow-500">分量</th>
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
    
    
    </form>
    
              
  
  </div>
</section>
    
    
    
    
  <section class="text-gray-600 body-font">
  <div class="container px-5 mx-auto flex flex-wrap">
    <div class="flex flex-wrap w-full">
      <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
            <p class="leading-relaxed">まず材料1のささみを小さく切って茹でます。できるだけ細かく切ってください。筋などがあれば取るようにして下さい。</p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 2</h2>
            <p class="leading-relaxed">次に材料2の人参をを小さく切って茹でます。できるだけ細かく切ってください。柔らかくなるまでゆでてください。　</p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <circle cx="12" cy="5" r="3"></circle>
              <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 3</h2>
            <p class="leading-relaxed">次に材料2の人参をを小さく切って茹でます。できるだけ細かく切ってください。柔らかくなるまでゆでてください</p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 4</h2>
            <p class="leading-relaxed">次に材料3と4の野菜を小さく切って茹でます。できるだけ細かく切ってください。柔らかくなるまでゆでてください</p>
          </div>
        </div>
        <div class="flex relative">
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
              <path d="M22 4L12 14.01l-3-3"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
            <p class="leading-relaxed">以上茹でた全ての材料を一緒にまぜてできあがり</p>
          </div>
        </div>
      </div>
      <div class="lg:w-1/2 lg:pl-10 lg:py-6 mt-6 lg:mt-0"><!--ここから-->
                          <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
                                    <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div style="width:1000px;height:400px;"　class="p-6 text-gray-900 dark:text-gray-100">
                                        
                                        <canvas id="mychart"></canvas>    
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                  </div><!--ここまで-->
  
      <!--<img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="https://dummyimage.com/1200x500" alt="step">-->
    </div>
  </div>
</section>
    
    
    
    
    

</x-app-layout>





  



<script>
  // inputタグを取得する
  const inputIntake = document.getElementById('inputIntake');

  // フォームが送信されたら、入力値をセッションに保存する
  inputIntake.form.addEventListener('submit', function(event) {
    event.preventDefault();
    const intake = inputIntake.value;
    fetch('/save-intake', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        intake: intake
      })
    }).then(function() {
      location.reload();
    });
  });
</script>

<script>

const ctx = document.getElementById("mychart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "radar",
        data: {
            labels: ["タンパク質", "ビタミン", "脂質", "炭水化物"],
            datasets: [
            
                 
               
                {
                    label: "ドッグフードとレシピを食べた時の摂取量",
                    data: [5,5,5,5],
                    backgroundColor: "rgba(255, 68, 0, 0.4)",
                    borderColor: "rgba(255, 68, 0, 0.4)",
                    borderWidth: 1,
                    
                },
                 {
                    label: "必要栄養素量",
                    data: [4,5,6,5],
                    backgroundColor: "rgba(255,0,77,0.5)",
                    borderColor: "rgba(255,255,77,0.5)",
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