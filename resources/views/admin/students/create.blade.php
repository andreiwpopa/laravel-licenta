<x-admin-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.students.store') }}">
            @csrf
            <div>
                <label for="nume_complet" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nume complet</label>
                <input type="text" id="nume_complet" name="nume_complet" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Adresa de mail</label>
                <input type="email" id="email" name="email" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="data_nastere" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Data nastere</label>
                <input type="date" id="data_nastere" name="data_nastere" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="tara_nastere" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tara nastere</label>
                <input type="text" id="tara_nastere" name="tara_nastere" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="judet_nastere" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Judet nastere</label>
                <input type="text" id="judet_nastere" name="judet_nastere" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="sex" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sex</label>
                <select name="sex" id="sex" class=" mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="masculin">Masculin</option>
                    <option value="feminin">Feminin</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
