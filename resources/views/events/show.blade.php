<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">

                <img class="w-48 mr-6 mb-6" src="{{$event->logo ? asset('storage/' . $event->logo) : asset('/images/no-image.png')}}" alt=""/>

                <h3 class="text-2xl mb-2">{{$event->name}}</h3>
                <div class="text-xl font-bold mb-4">{{$event->category->name}}</div>
                <x-event-tags  :tagsCsv="$event->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$event->location->street}} {{$event->location->number}}, {{$event->location->city}}, {{$event->location->country}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4"> Job Description </h3>
                    <div class="text-lg space-y-6">
                        {{$event->description}}

                        <a href="mailto:{{$event->email}}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i> Contact Employer</a>

                        <a href="{{$event->website}}" target="_blank" class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit Website</a>
                    </div>
                </div>
            </div>
        </x-card>
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/events/{{$event->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
            <form method="POST" action="/events/{{$event->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </x-card>
    </div>
</x-layout>