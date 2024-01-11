<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
    </div>
</div>
