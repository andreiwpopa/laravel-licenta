<x-admin-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.students.store-context-scolaritate') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $id }}">

            <div>
                <label for="facultate" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Facultate</label>
                <select name="facultate" id="facultate" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @foreach($facultati as $facultate)
                        <option value="{{$facultate->id}}">{{$facultate->facultate_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="departament" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Departament</label>
                <select name="departament" id="departament" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                </select>
            </div>

            <div class="mt-4">
                <label for="forma_invatamant" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Forma de invatamant</label>
                <select name="forma_invatamant" id="forma_invatamant" class=" mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="zi">ZI</option>
                    <option value="ff">FF</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="an_studiu" class="block font-medium text-sm text-gray-700 dark:text-gray-300">An studiu</label>
                <input type="text" id="an_studiu" name="an_studiu" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="modul" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Modul</label>
                <input type="text" id="modul" name="modul" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="grupa" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Grupa</label>
                <input type="text" id="grupa" name="grupa" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="numar_matricol" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nr. matricol</label>
                <input type="text" id="numar_matricol" name="numar_matricol" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="status_curent" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Status curent</label>
                <select name="status_curent" id="status_curent" class=" mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="inmatriculat">Inmatriculat</option>
                    <option value="neinmatriculat">Neinmatriculat</option>
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

<script>

    const facultate = document.querySelector('[name="facultate"]');
    const departamente = document.querySelector('[name="departament"]');

    facultate.addEventListener('change', function() {
        const selectedFacultateId = this.value;

        if (selectedFacultateId) {
            fetch(`/departamente/${selectedFacultateId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(departament => {
                        const option = document.createElement('option');
                        option.value = departament.id;
                        option.text = departament.departament_name;
                        departamente.appendChild(option);
                    });
                })
                .catch(error => console.error(error));
        }
    });


</script>
