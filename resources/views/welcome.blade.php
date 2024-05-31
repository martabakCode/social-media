@extends('layouts.user')
@section('content')
<div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">
    <nav class="relative flex w-full flex-wrap items-center justify-between py-2 shadow-dark-mild lg:py-4">
        <div class="flex w-full flex-wrap items-center justify-between">
            <img src="{{ asset('assets/img/logo-medsos.png') }}" class="h-6 mx-auto" alt="Social Media">
        </div>
        <div class="flex w-full flex-wrap text-center justify-between">
            <ul class="font-medium mx-auto flex md:flex-row rtl:space-x-reverse">
                <li>
                    <a href="{{ url('/') }}" class="block py-2 px-7 hover:text-cyan-500  {{ request()->is('/') ? 'border-b-4 border-cyan-500' : '' }} text-white" aria-current="page">For You</a>
                </li>
                <li>
                    <a href="{{ url('/following') }}" class="block py-2 px-5 hover:text-cyan-500  {{ request()->is('/following') ? 'border-b-4 border-cyan-500' : '' }} text-white">Following</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="md:flex">
        <div class="w-full md:w-3/4 lg:w-3/5 p-5  md:px-12 lg:24 h-full overflow-x-scroll antialiased">
            <div class="border border-white p-8 rounded-lg shadow-md mt-6 max-w-md">
                <!-- User Info with Three-Dot Menu -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <img src="https://placekitten.com/40/40" alt="User Avatar" class="w-8 h-8 rounded-full">
                        <div>
                            <p class="text-gray-200 font-semibold">John Doe</p>
                            <p class="text-gray-400 text-sm">Posted 2 hours ago</p>
                        </div>
                    </div>
                    <div class="text-gray-100 cursor-pointer">
                        <!-- Three-dot menu icon -->
                        <button class="hover:bg-gray-50 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="7" r="1" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="17" r="1" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Message -->
                <div class="mb-4">
                    <p class="text-gray-100">Just another day with adorable kittens! 🐱 </p>
                </div>
                <!-- Image -->
                <div class="mb-4">
                    <img src="https://placekitten.com/400/300" alt="Post Image" class="w-full h-48 object-cover rounded-md">
                </div>
                <hr class="mt-2 mb-2">
                <!-- Like and Comment Section -->
                <div class="flex items-center justify-between text-gray-500">
                    <div class="flex items-center space-x-2">
                        <button class="flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C6.11 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-4.11 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                            <span>42 Likes</span>
                        </button>
                    </div>
                    <button class="flex justify-center items-center gap-2 px-2 hover:bg-gray-50 rounded-full p-1">
                        <svg width="22px" height="22px" viewBox="0 0 24 24" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"></path>
                            </g>
                        </svg>
                        <span>3 Comment</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/4 lg:w-2/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">
            <div class="w-full max-w-md p-4 border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-white">Siapa yang harus di ikuti?</h5>
                    <h6 class="text-md leading-none text-gray-400">Orang yang mungkin anda kenal</h6>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium truncate text-white"> Username </p>
                                    <p class="text-sm truncate text-gray-400"> Nama Lengkap </p>
                                </div>
                                <a href="" class="inline-flex items-center text-base font-semibold text-cyan-500"> Follow </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="items-center justify-between">
                    <h6 class="text-xs leading-none text-gray-500">Terms of Service Privacy Policy Cookie Policy Accesibility Ads info more @ 2023 Sosmed</h6>
                </div>
            </div>
        </div>
    </div>

@endsection
