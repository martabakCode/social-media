@extends('layouts.user')

@section('content')
<div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">

    <div class="w-full  p-4 border border-gray-400 rounded-lg shadow sm:p-6 md:p-8 ">
        <form class="space-y-6" action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <!-- Validation Errors --> @if ($errors->any()) <div class="mb-4">
					<div class="font-medium text-red-600">
						{{ __('Whoops! Something went wrong.') }}
					</div>@endif
                    <h1 class="text-xl font-medium text-white">Edit Profile</h1>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-mediumtext-white">Title</label>
                        <input type="text" value="{{ old('title') ?? $user->profile->title }}" name="title" id="title" class=" @error('title') border-red-600 @enderror border bg-transparent border-gray-300 text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="UI/UX Desainer" required />
                        @error('title')
                        <span class="text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-mediumtext-white">Description</label>
                        <textarea id="description" rows="4" class="@error('description') border-red-500 @enderror border text-sm rounded-lg block w-full p-2.5 bg-transparent border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="description" placeholder="Description">{{ old('description') ?? $user->profile->description }}</textarea>
                        @error('description')
                        <span class="text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="url" class="block mb-2 text-sm font-mediumtext-white">Url</label>
                        <input value="{{ old('url') ?? $user->profile->url }}" type="text" name="url" id="url" class=" @error('url') border-red-600 @enderror border bg-transparent border-gray-300 text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://wwww.facebook.com" required />
                        @error('url')
                        <span class="text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
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

                    <div class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <button type="submit" class="btn btn-primary">Save Profile</button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
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
