@extends('layouts.auth')
@section('content')
<div class="font-[sans-serif] text-white bg-black">
	<div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
		<div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
			<div class="lg:h-[400px] md:h-[300px] max-md:mt-10 flex items-center justify-center">
				<img src="{{ asset('assets/img/logo-medsos.png') }}" class="lg:h-[200px] md:h-[100px] object-center" alt="Dining Experience" />
			</div>
			<form class="space-y-6 max-w-md md:ml-auto max-md:mx-auto w-full" method="POST" action="{{ route('login') }}"> @csrf <h3 class="text-3xl font-extrabold mb-8 max-md:text-center"> Sign in </h3>
				<div class="mb-4 font-medium text-sm text-green-600">
					{{ session('status') }}
				</div>
				<!-- Validation Errors --> @if ($errors->any()) <div class="mb-4">
					<div class="font-medium text-red-600">
						{{ __('Whoops! Something went wrong.') }}
					</div>
					<ul class="mt-3 list-disc list-inside text-sm text-red-600"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
				</div> @endif <div>
					<input name="username" value="{{ old('username') }}" type="text" autocomplete="username" required class="bg-gray-100 text-black w-full text-sm px-4 py-3.5 rounded-md outline-cyan-600" placeholder="Username" required autofocus />
				</div>
				<div>
					<input name="password" type="password" autocomplete="current-password" required class="bg-gray-100 text-black w-full text-sm px-4 py-3.5 rounded-md outline-cyan-600" placeholder="Password" required autocomplete="current-password" />
				</div>
				<div class="!mt-10">
					<button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none"> Log in </button>
				</div>
				<p class="my-10 text-sm text-gray-200 text-center">Belum punya akun? <a class="text-cyan-600 font-semibold" href="{{url('register')}}"> Daftar</a>
				</p>
			</form>
		</div>
	</div>
</div>
<div class="font-[sans-serif] text-black bg-white">
	<div class="flex fle-col items-center justify-center py-6 px-4">
		<div class="grid md:grid-cols-2 gap-10 max-w-6xl w-full">
			<div>
				<div class="flex items-center justify-between">
					<p class="flex">
						<img src="{{ asset('assets/img/logo-medsos.png') }}" class="h-8 mr-3" alt="Social Media">
						<span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Tentang Kami</span>
					</p>
				</div>
				<p class="text-sm text-gray-600 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deserunt placeat fugiat sit ducimus ratione ex, dolorum optio dolorem. Deserunt quia qui soluta aliquam deleniti beatae recusandae adipisci eos nihil?</p>
			</div>
			<div>
				<h1 class="text-xl font-extrabold text-center">Kontak</h1>
				<p class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600 dark:text-white" width="16px" height="16px" fill='current' viewBox="0 0 479.058 479.058">
						<path d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z" data-original="#000000" />
					</svg>
					<a href="" class="dark:text-white text-gray-600 text-sm ml-3">
						<strong>info@example.com</strong>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
@endsection
