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
				</div>
                @auth
                @if ($user->id == auth()->user()->id)
                <a href="/profile/{{$user->id}}/edit" class="text-xs font-bold text-black p-2 rounded bg-white">Edit Profile</a>
                @else
                <form action="{{ url('follow/'.$user->id) }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->

                    @if ($user->profile->followers->find(auth()->user()->id) == true)
                    <button class="text-xs font-bold text-gray-200 p-2 rounded"> Unfollowed</button>
                    @else
                    <button class="text-xs font-bold text-white p-2 rounded bg-cyan-400"> Follow</button>
                    @endif
                </form>

                @endif
                @endauth
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
			<div class="text-gray-300 flex flex-col mb-3">
				<div class="font-bold">
					{{$user->profile->title}}
				</div>
				<div>
					{{$user->profile->description}}
				</div>
				<div>
					<a class="text-blue-600" href="{{$user->profile->url}}">{{$user->profile->url}}</a>
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
