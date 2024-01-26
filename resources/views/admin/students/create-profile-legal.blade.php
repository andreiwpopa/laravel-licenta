<x-admin-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.students.store-profile-legal') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $id }}">

            <div>
                <label for="mediu" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Mediu</label>
                <select name="mediu" id="mediu" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="Urban">Urban</option>
                    <option value="Rural">Rural</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="strain" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Strain</label>
                <select name="strain" id="strain" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="Da">Da</option>
                    <option value="Nu">Nu</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="minoritar" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Minoritar</label>
                <select name="minoritar" id="minoritar" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="Da">Da</option>
                    <option value="Nu">Nu</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="cetatenie" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Cetatenie</label>
                <input type="text" id="cetatenie" name="cetatenie" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="nationalitate" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nationalitate</label>
                <input type="text" id="nationalitate" name="nationalitate" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="cnp" class="block font-medium text-sm text-gray-700 dark:text-gray-300">CNP</label>
                <input type="text" id="cnp" name="cnp" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" pattern="^[0-9]{13}$">
            </div>

            <div class="mt-4">
                <label for="serie" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Serie BI/CI</label>
                <input type="text" id="serie" name="serie" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="stare_civila" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Stare civila</label>
                <select name="stare_civila" id="stare_civila" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="casatorit">Casatorit</option>
                    <option value="necasatorit">Necasatorit</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="situatie_militara" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Situatie militara</label>
                <select name="situatie_militara" id="situatie_militara" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="neincorporabil">Neincorporabil</option>
                    <option value="incorporabil">Incorporabil</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="nr_livret_militar" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Numar livret militar</label>
                <input type="text" id="nr_livret_militar" name="nr_livret_militar" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>
