<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">Manage Gigs</h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($events->isEmpty())
                    @foreach($events as $event)
                        @if($event->confirmed == 0)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/events/{{$event->id}}">{{$event->name}}</a>
                                </td>
                                {{-- <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/events/{{$event->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl" >
                                        <i class="fa-solid fa-check"></i> Confirm</a>
                                </td> --}}
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="POST" action="/events/{{$event->id}}/confirmation">
                                        @csrf
                                        <button class="text-green-600">
                                            <i class="fa-solid fa-check"></i> Confirm</a>
                                        </button>
                                    </form>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="POST" action="/events/{{$event->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif    
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No events found</p>
                            <a href="/events/create" class="absolute right-10 border border-gray-300 py-2 px-5">Post Job</a>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>