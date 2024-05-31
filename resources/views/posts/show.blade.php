@extends('layouts.user')
@section('content')
<div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 h-full overflow-x-scroll antialiased">
	<nav class="relative flex w-full flex-wrap items-center justify-between py-2 shadow-dark-mild lg:py-4">
		<div class="flex w-full flex-wrap items-center justify-between">
			<img src="{{ asset('assets/img/logo-medsos.png') }}" class="h-6 mx-auto" alt="Social Media">
		</div>
	</nav>
	<a href="{{url('')}}"  type="button" class="flex items-center justify-center px-5 py-2 text-sm text-gray-200 transition-colors duration-200  border rounded-lg gap-x-2 sm:w-auto  hover:bg-gray-100 hover:text-black">
		<svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
		</svg>
		<span>Go back</span>
	</a>
	<div class="md:flex ">
		<div class="w-full py-4 h-full overflow-x-scroll antialiased">
			<div class="grid grid-cols-2 items-center m-0 border border-gray-200 rounded-lg shadow text-white">
				<div class="p-4">

                    <a href="{{ url('profile/'.$post->user->id) }}">
						<div class="grid grid-cols-12 grid-flow-col">
							<div class="col-span-2 ">
								<img src="{{ $post->user->profile->profileImage() }}" class="h-8 mr-3 border rounded-full border-gray-600" alt="Social Media">
							</div>
							<div class="col-span-10">
								<span class="self-center text-md font-semibold whitespace-nowrap">{{$post->user->name}}</span>
							</div>
						</div>
					</a>
                    <p class="font-semibold text-xl mb-2">{{$post->caption}}</p>
					<img class="object-cover w-full rounded-xl " src="{{ url('storage/'.$post->image) }}" alt="">
					<p class="font-medium text-base mt-2">{{$post->desc}}</p>
				</div>
				<div class="flex flex-col justify-between p-4 leading-normal">
					<p class="text-gray-200 font-semibold">Comment</p>
					<hr class="mt-2 mb-2">
                    @foreach($post->comments as $comment)
                    @if($comment != $post->comments[$post->comments->count() - 1])
					<div class="mt-4">
                            <div class="flex items-center space-x-2">
                                <img src="{{$comment->user->profile->profileImage()}}" alt="User Avatar" class="w-6 h-6 rounded-full">
                                <div>
                                    @if($comment->user_id != auth()->user()->id)
                                    <a href="/profile/{{ $comment->user->id }}" class="text-gray-200 font-semibold">{{$comment->user->username}}</a>
                                    @else
                                    <a href="/profile/{{ $comment->user->id }}" class="text-gray-200 font-semibold">{{$comment->user->username}}</a> <a href="/c/delete/{{ $comment->id }}" class="text-red-600 text-sm">Delete</a>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-2 text-gray-200">{{$comment->content}}</p>
                            @else
                            <div class="flex items-center space-x-2">
                                <img src="{{$comment->user->profile->profileImage()}}" alt="User Avatar" class="w-6 h-6 rounded-full">
                                <div>
                                    @if($comment->user_id != auth()->user()->id)
                                    <a href="/profile/{{ $comment->user->id }}" class="text-gray-200 font-semibold">{{$comment->user->username}}</a>
                                    @else
                                    <a href="/profile/{{ $comment->user->id }}" class="text-gray-200 font-semibold">{{$comment->user->username}}</a> <a href="/c/delete/{{ $comment->id }}" class="text-red-600 text-sm">Delete</a>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-2 text-gray-200">{{$comment->content}}</p>
                        </div>
                            @endif


                    @endforeach
					<hr class="mt-2 mb-2">
					<div class="flex items-center justify-between text-gray-500">
						<div class="flex items-center space-x-2">
							<button class="flex justify-center items-center gap-2 px-2 rounded-full p-1">

                                <form action="{{ url('like/'.$post->id) }}" method="POST">
                                    @csrf <!-- Add CSRF token for security -->
                                    <button type="submit">
								<svg class="w-5 h-5 {{$post->likers->find(auth()->user()->id) == true ? "text-red-500" : "" }} hover:text-red-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path d="M12 21.35l-1.45-1.32C6.11 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-4.11 6.86-8.55 11.54L12 21.35z" />
								</svg>
                            </button>
                            </form>
                                </a>
								<span>{{$post->likers->count()}} Likes</span>
							</button>
						</div>
						<div class="flex items-center space-x-2">
							<a href="{{ url('p/'.$post->id) }}" class="flex justify-center items-center gap-2 px-2 rounded-full p-1">
                                <svg width="22px" height="22px" viewBox="0 0 24 24" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"></path>
                                    </g>
                                </svg>
                                <span>{{$post->comments()->count()}} Comment</span>
                            </a>
						</div>
						<form action="{{ url('bookmark/'.$post->id) }}" method="POST">
                            @csrf <!-- Add CSRF token for security -->

                        <button class="flex  justify-center items-center gap-2 px-2 rounded-full p-1">
                            <i class="fa-solid fa-bookmark {{$post->bookmarkers->find(auth()->user()->id) == true ? "text-yellow-300" : "" }} hover:text-yellow-300"></i>
                        </button>
                    </form>
					</div>
					<hr class="mt-2 mb-2">
					<form class="mb-6" action="/p/{{$post->id}}" enctype="multipart/form-data" method="post">
                        @csrf
						<div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
							<label for="comment" class="sr-only">Your comment</label>
							<textarea name="content" value="{{ old('content') }}"  autocomplete="content" autofocus rows="6" class="px-0 w-full text-sm bg-transparent text-gray-400 border-0 focus:ring-0 focus:outline-none" placeholder="Write a comment..." required></textarea>
						</div>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
						<button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-cyan-700 rounded-lg focus:ring-4 focus:ring-primary-200 "> Post comment </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
