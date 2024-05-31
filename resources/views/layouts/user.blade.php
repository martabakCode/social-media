<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      eCommerce Dashboard | TailAdmin - Tailwind CSS Admin Dashboard Template
    </title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body class="bg-gray-50 dark:bg-gray-800">
    @if (Route::has('login'))

            @auth

            @else
            <div class="fixed bottom-0 left-0 z-50 w-full h-24 bg-cyan-600">
                <div class="grid grid-cols-12 max-w-5xl mx-auto font-medium">
                        <div class="lg:col-span-9 md:col-span-7 col-span-6 p-6 text-white ">
                            <p class="font-bold lg:text-lg md:text-md text-sm">Jangan ketingalan berita terbaru</p>
                            <p class="lg:text-base md:text-sm text-xs">Login untuk pengalaman yang baru</p>
                        </div>
                        <div class="lg:col-span-3 md:col-span-5 col-span-6 flex p-6 text-white content-center">
                            <a href="{{ route('login') }}" class="text-white hover:text-black border border-white hover:border-black hover:bg-white focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 text-center me-2 mb-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-900 bg-white  focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xs md:text-sm px-5 py-2.5 me-2 mb-2">Register</a>
                            @endif
                        </div>
                </div>
            </div>
            @endauth

        @endif
        <div class="w-full bg-black text-white flex flex-row flex-wrap justify-center ">
        @include('layouts.sidebar-user')
        @yield('content')

	</div>
</div>
  </body>
</html>
