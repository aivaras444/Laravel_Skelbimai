<x-app-layout>
    <x-guest-layout>
        <form action="{{ route('skelbimai.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div>
                <label class="block mt-1 w-full" for="title">Pavadinimas</label>
                <input class="block mt-1 w-full" type="text" id="title" value="{{ old('title')}}" name="title">
                @error('title')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <label class="block mt-1 w-full" for="dscription">Aprasymas</label>
                <textarea class="block mt-1 w-full" name="dscription" id="dscription" rows="4">{{ old('dscription')}}</textarea>
                @error('dscription')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <label class="block mt-1 w-full" for="price">Kaina</label>
                <input class="block mt-1 w-full" type="text" id="price" name="price" value="{{ old('price')}}">
                @error('price')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <label class="block mt-1 w-full" for="image">Nuotrauka</label>
                <input class="block mt-1 w-full" type="file" id="image" name="image">
                @error('image')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Patvirtinti') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>