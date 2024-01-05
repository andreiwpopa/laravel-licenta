<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-center">
                    <p class="text-white text-xl">Studenti Inscrisi</p>
                </div>
                <div class="flex justify-between p-2">
                    <a href="{{ route('admin.students.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Add Student</a>
                    <button x-data x-on:click="$dispatch('open-modal')" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Admitere</button>
                </div>

                <x-modal>
                    <div class="w-full sm:max-w-md mx-auto mt-5 mb-5 px-6 py-4 ">
                        <h1 class="font-bold text-xl text-center text-gray-700 dark:text-gray-300">Admitere</h1>
                        <p class="mt-5 font-medium text-lg text-gray-700 dark:text-gray-300">Selecteaza facultatea si departamentul pentru admiterea studentilor</p>
                        <form method="POST" action="" class="mt-5">
                            @csrf
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

                            <div class="flex items-center justify-end mt-4">

                                <x-primary-button class="ml-4">
                                    {{ __('Genereaza studentii admisi') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </x-modal>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Facultate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Departament
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $students as $student )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student->nume }}
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student->email }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student->facultate }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student->departament }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


            </div>
        </div>
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
