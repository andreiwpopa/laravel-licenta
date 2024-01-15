<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if(isset($message))
            <div class="flex items-center justify-center rounded-xl my-5 bg-blue-500 dark:bg-blue-800 w-[30%] mx-auto text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>Admiterea trebuie realizata!</p>
            </div>
        @else
            <div class="flex-items-center justify-between d p-4">
                <div class="flex justify-between">
                    <input wire:model.live.debounce.300ms="search" type="text" class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' placeholder="Cauta" required=""/>

                    <div>
                        <select wire:model.live="facultateId" name="facultate" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Selecteaza facultate</option>
                            @foreach($this->facultati as $facultate)
                                <option value="{{ $facultate->id }}">{{ $facultate->facultate_name }}</option>
                            @endforeach
                        </select>
                        <select wire:model.live="departamentId" name="departamente"  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Selecteaza departament</option>
                            @foreach($this->departamente as $departament)
                                <option value="{{ $departament->id }}">{{ $departament->departament_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-xs text-gray-700 uppercase dark:text-gray-400 pr-3">Loc confirmat</label>
                        <select wire:model.live="confirmat" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Toti</option>
                            <option value="0">Neconfirmat</option>
                            <option value="1">Confirmat</option>
                        </select>
                    </div>
                </div>


            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nume
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
                    <th scope="col" class="px-6 py-3">
                        Loc Confirmat
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach( $students as $student )
                    <tr wire:key="{{ $student->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $student->nume_complet }}
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $student->email }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $student->facultate_id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $student->departament_id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $student->loc_confirmat ? 'DA' : 'NU' }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if($student->loc_confirmat)
                                Confirmat
                            @else
                            <button onclick="confirm('Are you sure you want to confirm {{ $student->nume_complet }} place ?') || event.stopImmediatePropagation()" wire:click="confirma_loc({{$student->id}})" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Confirma Loc</button>
                                <button onclick="confirm('Are you sure you want to remove {{ $student->nume_complet }} ?') || event.stopImmediatePropagation()" wire:click="neconfirmat({{$student->id}})" class="px-4 py-2 bg-red-700 hover:bg-red-500 rounded-md text-white">Neconfirmat</button>

                        </td>
                            @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        @endif
    </div>
</div>
