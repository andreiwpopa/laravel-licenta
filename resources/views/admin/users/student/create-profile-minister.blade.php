<x-admin-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.users.store-student-profile-minister') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $uid }}">

            <div class="mt-4">
                <label for="serie_pasaport" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Serie pasaport</label>
                <input type="text" id="serie_pasaport" name="serie_pasaport" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="nr_aprob_minister" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Numar aprob minister</label>
                <input type="text" id="nr_aprob_minister" name="nr_aprob_minister" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="serie_aprob_minister" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Serie aprob minister</label>
                <input type="text" id="serie_aprob_minister" name="serie_aprob_minister" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="data_aprob_minister" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Data aprob minister</label>
                <input type="date" id="data_aprob_minister" name="data_aprob_minister" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>
