<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit the Event</h2>
            <p class="mb-4">Edit: {{$event->name}}</p>
        </header>

        <form method="POST" action="/events/{{$event->id}}" enctype="multipart/form-data">
            @csrf {{-- protection--}}
            @method('PUT')
            {{-- <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">Category</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="category" value="{{$event->category}}"/>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Event Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" placeholder="Example: Senior Laravel Developer" value="{{$event->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Event Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{$event->location}}"/>
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$event->tags}}"/>
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Event Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo"/>
                
                <img class="w-48 mr-6 mb-6" src="{{$event->logo ? asset('storage/' . $event->logo) : asset('/images/no-image.png')}}" alt=""/>
                
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Event Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">{{$event->description}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Event
                </button>

                <a href="/events/{{$event->id}}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>