
	<!-- Begin Navbar -->
	<div class="bg-black shadow-lg border-b-4 border-cyan-500 absolute top-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
		<div class="w-full bg-black z-10">
			<nav class="relative flex w-full flex-wrap items-center justify-between py-2 lg:py-4 bg-black">
				<div class="flex w-full flex-wrap items-center justify-between px-3 ">
					<!-- Avatar -->
					<div class="relative ms-3" data-twe-dropdown-ref>
                        @if (Route::has('login'))
                        @auth
						<a href="{{ url('profile/'.Auth::user()->id) }}" class="flex items-center whitespace-nowrap text-white transition duration-200  hover:ease-in-out focus:text-black/80 motion-reduce:transition-none" href="#">
								<div class="grid grid-cols-12 grid-flow-col">
									<div class="col-span-2 ">
										<img src="{{ Auth::user()->profile->profileImage() }}" class="h-8 mr-3 border rounded-2xl border-gray-600" alt="Social Media">
									</div>
									<div class="col-span-10">
										<span class="self-center text-md font-semibold whitespace-nowrap">{{Auth::user()->name}}</span>
									</div>
								</div>
							</a> @else <a href="{{ route('login') }}">
								<div class="grid grid-cols-12 grid-flow-col">
									<div class="col-span-2 ">
										<img src="{{ asset('assets/img/logo-medsos.png') }}" class="h-8 mr-3 border rounded-2xl border-gray-600" alt="Social Media">
									</div>
									<div class="col-span-10">
										<div class="grid grid-rows-2 grid-flow-col">
											<span class="self-center text-md font-semibold whitespace-nowrap">Silahkan Login Dahulu</span>
											<span class="self-center text-sm text-gray-400 whitespace-nowrap">Ayo Login</span>
										</div>
									</div>
								</div>
							</a> @endauth @endif </a>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-black shadow-lg border-r-2 border-gray-600 ">
		<div class="p-5  sticky top-0 border-b-2 border-gray-600"> @if (Route::has('login')) @auth <a href="{{ url('profile/'.auth()->user()->id) }}">
				<div class="grid grid-cols-12 grid-flow-col">
					<div class="col-span-2 ">
						<img src="{{ Auth::user()->profile->profileImage() }}" class="h-8 mr-3 border rounded-2xl border-gray-600" alt="Social Media">
					</div>
					<div class="col-span-10">
						<span class="self-center text-md font-semibold whitespace-nowrap">{{Auth::user()->name}}</span>
					</div>
				</div>
			</a> @else <a href="{{ route('login') }}">
				<div class="grid grid-cols-12 grid-flow-col">
					<div class="col-span-2 ">
						<img src="{{ asset('assets/img/logo-medsos.png') }}" class="h-8 mr-3 border rounded-2xl border-gray-600" alt="Social Media">
					</div>
					<div class="col-span-10">
						<div class="grid grid-rows-2 grid-flow-col">
							<span class="self-center text-md font-semibold whitespace-nowrap">Silahkan Login Dahulu</span>
							<span class="self-center text-sm text-gray-400 whitespace-nowrap">Ayo Login</span>
						</div>
					</div>
				</div>
			</a> @endauth @endif </div>
		<div class="h-full px-3 py-4 overflow-y-auto bg-black">
			<ul class="space-y-2 font-medium"> @auth <li>
					<a href="{{ url('') }}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-house flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="ms-3">Home</span>
					</a>
				</li>
				<li>
					<a href="{{ url('explore') }}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-magnifying-glass flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Explore</span>
					</a>
				</li>
				<li>
					<a href="{{ url('notifikasi') }}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-bell flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Notifikasi</span>
					</a>
				</li>
				<li>
					<a href="{{ url('p/create') }}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-plus flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Posting</span>
					</a>
				</li>
				<li>
					<a href="bookmark" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-bookmark flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Bookmarks</span>
					</a>
				</li>
				<li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
                        <i class="fa-solid fa-right-from-bracket flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </button>
				</li> @else <li>
					<a href="{{ url('')}}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-house flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="ms-3">Home</span>
					</a>
				</li>
				<li>
					<a href="{{ url('explore')}}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-magnifying-glass flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Explore</span>
					</a>
				</li>
				<li>
					<a href="#" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
						<i class="fa-solid fa-right-to-bracket flex-shrink-0 w-5 h-5 transition duration-75 text-cyan-400 group-hover:text-white"></i>
						<span class="flex-1 ms-3 whitespace-nowrap">Login</span>
					</a>
				</li> @endauth
			</ul>
		</div>
	</div>
	<!-- End Navbar -->


