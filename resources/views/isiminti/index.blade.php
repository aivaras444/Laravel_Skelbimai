<x-app-layout>
    <div class="font-sans text-gray-900 antialiased">
        @if($isiminti->count() > 0)
            @foreach ($isiminti as $item)
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    @if($item->skelbimai == null)
                        <h4>istrintas</h4>
                    @else
                    <a href="{{ route('skelbimai.show', $item->skelbimai->id)}}">
                        <div class="flex justify-between">
                            <img src="{{ url('/images/'.$item->skelbimai->image) }}" 
                            style="width: 110px;">
                        </div>
                        <div class="text-xl hidden sm:flex sm:items-center sm:ml-6">
                            <div class="text-left shrink-0 px-2 flex-1 items-center">
                                {{$item->skelbimai->title}}
                            </div>
                            <div class="ml-2 text-xl text-gray-600 dark:text-gray-400">

                                Kaina: {{$item->skelbimai->price}}
                                
                            </div>
                        </div>
                    </a>
                    @endif
                    <tr>
                        <div class="flex items-center justify-end mt-4">
                            <form action="{{ route('isiminti.add') }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" value="{{ $item->skelbimo_id }}" name="skelbimo_id">
                                <x-primary-button class="ml-3">
                                    {{ __('Isiminti') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </tr>
                </div>
            </div>
            @endforeach
        @else

        @endif
    </div>
</x-app-layout>