@extends('layouts.user')

@section('content')
<div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">
	<div class="grid grid-cols-5">
		<div class="object-center"> @can('update', $user->profile) <a href="/profile/{{$user->id}}/edit">
				<img src="{{$user->profile->profileImage()}}" alt="insta-profile-pic" class="rounded-full w-36 h-36 p-5">
			</a> @else <img src="{{$user->profile->profileImage()}}" alt="insta-profile-pic" class="rounded-full w-36 h-36 p-5"> @endcan </div>
		<div class="col-span-4 flex flex-col gap-4">
			<div class="text-white w-full flex flex-row gap-5 items-center">
				<div class="text-2xl">
					{{$user->username}}
				</div> @can('update', $user->profile) <button class="text-xs font-bold text-white p-2 rounded bg-cyan-400" user-id="{{ $user->id }}" follows="{{$follows}}"> Follow</button> @endcan @cannot('update', $user->profile) <a href="/profile/{{$user->id}}/edit" class="text-xs font-bold text-black p-2 rounded bg-white">Edit Profile</a> @endcan
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
				</svg>
			</div>
			<div class="text-gray-300 flex flex-row gap-10 items-center">
				<div>
					<span class="font-semibold"> {{$user->posts->count()}} </span> Posts
				</div>
				<div>
					<span class="font-semibold"> {{$user->profile->followers->count()}} </span> Followers
				</div>
				<div>
					<span class="font-semibold"> {{$user->following->count()}} </span> Following
				</div>
			</div>
			<div class="text-gray-300 flex flex-col">
				<div class="font-bold">
					{{$user->profile->title}}
				</div>
				<div>
					{{$user->profile->description}}
				</div>
				<div>
					<a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
				</div>
			</div>
		</div>

	</div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @if($user->posts->count() > 0)
            @foreach($user->posts as $post)
            <div>
                <a href="/p/{{$post->id}}">
                <img class="h-auto max-w-full rounded-lg" src="/storage/{{ $post->thumbnail }}" alt="insta_post">
                </a>
            </div>
            @endforeach
        @else
            <div class="col-span-3"><p class="text-gray-400 text-center">Belum ada postingan yang dapat di tampilkan</p></div>
        @endif

    </div>
</div>




@endsection
