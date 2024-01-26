<div>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.students.store') }}">
            @csrf
            <div>
                <label for="nume" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nume complet</label>
                <input type="text" id="nume" name="nume" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Adresa de mail</label>
                <input type="email" id="email" name="email" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label for="facultate" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Facultatea</label>
                <select wire:model.live="selectedFacultate" name="facultate" class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Selecteaza facultatea</option>
                    @foreach($facultati as $facultate)
                        <option value="{{ $facultate->id }}">{{ $facultate->facultate_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="departamente" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Departamentul</label>
                <select wire:model.live="selectedDepartamente" name="departamente" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Selecteaza departamentul</option>
                    @if(!empty($departamente))
                        @foreach($departamente as $departament)
                            <option value="{{ $departament->id }}">{{ $departament->departament_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="mt-4" id="disciplinaField">
                <label for="discipline" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Discipline</label>
                <div class="flex mt-1">
                    <select wire:model="disciplineIds" name="discipline[]" id="discipline" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Selecteaza disciplina</option>
                        @if(!empty($discipline))
                            @foreach($discipline as $disciplina)
                                <option value="{{ $disciplina->id }}">{{ $disciplina->disciplina_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <button type="button" title="Adauga o disciplina noua" class="ml-2 my-auto bg-blue-500 text-white px-2 py-1 rounded-lg" onclick="adaugaSelect()">+</button>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

@script
<script>
    function adaugaSelect() {
        const diciplinaField = document.getElementById('disciplinaField');

        const newSelectDiv = document.createElement('div');
        newSelectDiv.classList.add('flex', 'mt-1');
        //w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
        const select = document.createElement('select');
        select.classList.add('w-full', 'border-gray-300', 'dark:border-gray-700', 'dark:bg-gray-900', 'dark:text-gray-300', 'focus:border-indigo-500', 'dark:focus:border-indigo-600', 'focus:ring-indigo-500', 'dark:focus:ring-indigo-600', 'rounded-md', 'shadow-sm');
        select.name = 'discipline';
        select.innerHTML= '<option value="">Selecteaza disciplina</option>';
        @if(!empty($discipline))
            @foreach($discipline as $disciplina)
                select.innerHTML = '<option value="{{ $disciplina->id }}">{{ $disciplina->disciplina_name }}</option>';
            @endforeach
        @endif
        const removeButton = document.createElement('button');
        removeButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
                                        <path d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z"></path>
                                    </svg>`;
        removeButton.classList.add('ml-2', 'bg-red-500', 'text-white', 'px-2', 'rounded-xl','mb-3');
        removeButton.addEventListener('click', function () {
            newSelectDiv.remove();
        });

        newSelectDiv.appendChild(select);
        newSelectDiv.appendChild(removeButton);
        disciplinaField.appendChild(newSelectDiv);
    }
</script>
@endscript
