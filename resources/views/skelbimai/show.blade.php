<x-app-layout>
    <div class="font-sans text-gray-900 antialiased">

        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{$skelbimas['title']}}
            </div>
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <img src="{{ url('/images/'.$skelbimas['image']) }}" style="width: 100px;">
            </div>
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                Aprasymas: {{$skelbimas['dscription']}}
            </div>
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                Kaina: {{$skelbimas['price']}}
            </div>
        </div>
        
    </div>
</x-app-layout>