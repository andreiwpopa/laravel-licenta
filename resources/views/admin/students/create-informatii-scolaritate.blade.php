<x-admin-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.students.store-informatii-scolaritate') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $id }}">

            <div>
                <label for="categorie_studii" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Categorie Studii</label>
                <input type="text" id="categorie_studii" name="categorie_studii" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="an_absolvire_liceu" class="block font-medium text-sm text-gray-700 dark:text-gray-300">An absolvire liceu</label>
                <input type="text" id="an_absolvire_liceu" name="an_absolvire_liceu" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="medie_bacalaureat" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Medie bacalaureat</label>
                <input type="number" id="medie_bacalaureat" name="medie_bacalaureat" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="olimpic" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Olimpic</label>
                <select name="olimpic" id="olimpic" class=" mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="1">DA</option>
                    <option value="0">NU</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="medie_admitere" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Medie admitere</label>
                <input type="number" id="medie_admitere" name="medie_admitere" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="promotie" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Promotie</label>
                <input type="text" id="promotie" name="promotie" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>
