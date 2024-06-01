@extends('layouts.user')

@section('content')
<div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">




    <div class="w-full max-w-xl p-4  border border-gray-200 rounded-lg shadow sm:p-8">
        <div class="flex items-center justify-between mb-4">
            <form class="w-full content-center" action="{{ url('explore') }}" method="GET">
                <div class="mx-auto content-center flex">
                    <input name="keyword" type="search" class="relative w-full m-0 -me-0.5 block bg-transparent flex-auto rounded-s border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary" placeholder="Search" aria-label="Search" id="exampleFormControlInput3" aria-describedby="button-addon3" />
                    <button type="submit" class="z-[2] inline-block r px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800
                            data-twe-ripple-init
                            data-twe-ripple-color=" white">Search</button>
                </div>
            </form>
    </div>
    <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @if (empty($results))
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="inline-flex items-center text-base font-semiboldtext-white">
                            No results found.
                        </div>
                    </div>
                </li>
            @else
            @foreach ($results as $result)
            <li class="py-3 sm:py-4">
                <a href="{{ url('profile/'.$result->id) }}">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{$result->profile->profileImage()}}" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-white">
                            {{$result->username}}
                        </p>
                        <p class="text-sm text-gray-400">
                            {{$result->name}}
                        </p>
                    </div>
                </div>
                </a>
            </li>
            @endforeach
            @endif
            </ul>
    </div>
    </div>
</div>




@endsection

