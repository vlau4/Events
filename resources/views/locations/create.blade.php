<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a Location</h2>
            <p class="mb-4">for new events</p>
        </header>

        <form method="POST" action="/locations/store" enctype="multipart/form-data">
            @csrf {{-- protection--}}
            <div class="mb-6">
                <label for="street" class="inline-block text-lg mb-2">Street</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="street" value="{{old('street')}}"/>
                @error('street')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="number" class="inline-block text-lg mb-2">Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="number" value="{{old('number')}}"/>
                @error('number')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="city" class="inline-block text-lg mb-2">City</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="city" value="{{old('city')}}"/>
                @error('city')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="zip" class="inline-block text-lg mb-2">Postal Zip Code</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="zip" placeholder="Example: 12345" value="{{old('zip')}}"/>
                @error('zip')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="country" class="inline-block text-lg mb-2">Country</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="country" value="{{old('country')}}"/>
                @error('country')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Create Location</button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>