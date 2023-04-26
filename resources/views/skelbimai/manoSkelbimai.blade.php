<x-app-layout>
    <div class="font-sans text-gray-900 antialiased">
        @if($skelbimai->count() > 0)
            @foreach ($skelbimai as $skelbimas)
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <a href="{{ route('skelbimai.show', $skelbimas['id'])}}">
                        <div class="flex justify-between">
                            <img src="{{ url('/images/'.$skelbimas['image']) }}" 
                            style="width: 110px;">
                        </div>
                        <div class="text-xl hidden sm:flex sm:items-center sm:ml-6">
                            <div class="text-left shrink-0 px-2 flex-1 items-center">
                                {{$skelbimas['title']}}
                            </div>
                            <div class="ml-2 text-xl text-gray-600 dark:text-gray-400">

                                Kaina: {{$skelbimas['price']}}
                                
                            </div>
                        </div>
                    </a>
                    <tr>
                        <div class="flex items-center justify-end mt-4">
                            <form action="{{ route('skelbimai.destroy',$skelbimas['id']) }}" method="POST">
                

                                <a class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" href="{{ route('skelbimai.edit',$skelbimas['id']) }}">Edit</a>


                                @csrf
                                @method('DELETE')

                                <x-primary-button class="ml-3">
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </tr>
                </div>
            </div>
            @endforeach
        @else
            <h4>Mano is empty</h4>
        @endif
    </div>
</x-app-layout>