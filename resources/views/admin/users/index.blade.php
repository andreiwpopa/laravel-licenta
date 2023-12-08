<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Create User</a>
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
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $users as $user )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="" class="font-medium px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md hover:underline">Roles</a>
                                    <a href="" class="font-medium px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md hover:underline">Permissions</a>

                                    <form method="POST" class="font-medium px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md hover:underline" action=" {{route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
