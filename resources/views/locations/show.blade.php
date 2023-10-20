<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">Manage Locations</h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <a href="/locations/create" class="absolute right-10 border border-gray-300 py-2 px-5">Create Location</a>
            <tbody>
                @unless($locations->isEmpty())
                    @foreach($locations as $location)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/locations/{{$location->id}}">{{$location->street}} {{$location->number}}, {{$location->city}}, {{$location->country}}</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/locations/{{$location->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl" >
                                    <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/locations/{{$location->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No locations found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>