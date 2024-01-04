<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-center">
                    <p class="text-white text-xl">Studenti Inscrisi</p>
                </div>
                <div class="flex justify-between p-2">
                    <a href="{{ route('admin.students.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Add Student</a>
                    <a href="" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Admitere</a>
                </div>

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
