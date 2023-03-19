 @vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>emeal</title>
    </head>
    
  
    <body class="antialiased bg-yellow-500">
        <div class="flex justify-center items-center h-screen">
            @if (Route::has('login'))
            
                
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-lg text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-lg text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                
               
            @endif
        </div>
        
    </body>
</html>
