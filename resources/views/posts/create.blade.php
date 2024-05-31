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
                    <a href="{{ url('/') }}" class="block py-2 px-7 hover:text-cyan-500  {{ request()->is('p/create') ? 'border-b-4 border-cyan-500' : '' }} text-white" aria-current="page">For You</a>
                </li>
                <li>
                    <a href="{{ url('/following') }}" class="block py-2 px-5 hover:text-cyan-500  {{ request()->is('/following') ? 'border-b-4 border-cyan-500' : '' }} text-white">Following</a>
                </li>
            </ul>
        </div>
    </nav>
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
    <div class="md:flex ">

        <div class="w-full p-5  md:px-12 lg:24 h-full overflow-x-scroll antialiased">
            <div class="border border-gray-500 mx-auto p-8 rounded-lg shadow-md mt-6 max-w-md">
                <!-- User Info with Three-Dot Menu -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <img src="{{$user->profile->profileImage()}}" alt="profile-pic" class="w-8 h-8 rounded-full">
                        <div>
                            <p class="text-gray-200 font-semibold">{{$user->username}}</p>
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
                    <input type="text" id="description" class="@error('caption') border-red-500 @enderror border text-sm rounded-lg block w-full p-2.5 bg-transparent border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="caption" value="{{ old('caption') }}" placeholder="Caption" required />
                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <!-- Image -->
                <div class="mb-4">
                    <div class="w-full">
                        <div class="w-full max-w-2xl p-8 mx-auto rounded-lg border-gray-600 border">
                          <div class="" x-data="imageData()">
                            <div x-show="previewUrl == ''">
                              <p class="text-center uppercase text-bold">
                                <label for="image" class="cursor-pointer text-cyan-400">
                                  Upload a file
                                </label>
                                <input type="file" name="image" id="image" class="hidden" @change="updatePreview()">
                              </p>
                            </div>
                            <div x-show="previewUrl !== ''">
                              <img :src="previewUrl" alt="" class="rounded">
                              <div class="">
                                <button type="button" class="text-yellow-400" @click="clearPreview()">change</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @error('image')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <textarea id="caption" rows="4" class="@error('caption') border-red-500 @enderror border text-sm rounded-lg block w-full p-2.5 bg-transparent border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="desc" value="{{ old('desc') }}" placeholder="Description"></textarea>
                    @error('desc')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <!-- Like and Comment Section -->
                <div class="flex items-center justify-between text-gray-500">
                    <div class="flex items-center space-x-2">
                    <button type="submit" class="flex bg-cyan-400 text-black justify-center items-center gap-2 px-4 hover:bg-gray-50 rounded-lg p-2">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</form>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/create-file-list"></script>
<script>
function imageData() {
  return {
    previewUrl: "",
    updatePreview() {
      var reader,
        files = document.getElementById("image").files;

      reader = new FileReader();

      reader.onload = e => {
        this.previewUrl = e.target.result;
      };

      reader.readAsDataURL(files[0]);
    },
    clearPreview() {
      document.getElementById("image").value = null;
      this.previewUrl = "";
    }
  };
}

</script>
@endsection
