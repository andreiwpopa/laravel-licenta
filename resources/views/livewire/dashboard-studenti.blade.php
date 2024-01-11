<div>
    <div>
        <h1 class="text-2xl mb-4 font-semibold text-gray-900 dark-mode:text-gray-200 text-center">Studenti - Panou Principal</h1>
        @foreach($facultati as $facultate)
            <h2 class="text-lg font-semibold text-gray-900 dark-mode:text-gray-200 my-2 pl-2">{{$facultate->facultate_name}}</h2>
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach($departamente as $departament)
                    @if($departament->facultate_id == $facultate->id)
                        @foreach($studentiInscrisi as $studentInscris)
                            @if($studentInscris->departament_id == $departament->id)
                                @php
                                    $inscrisiCount++;
                                @endphp
                            @endif
                        @endforeach
                        @foreach($admisi as $admis)
                            @if($admis->departament_id == $departament->id && $admis->loc_confirmat == 1)
                                @php
                                    $admisCount++;
                                @endphp
                            @endif
                        @endforeach

                        <div class="rounded-lg border dark:border-gray-700 bg-card text-card-foreground shadow-2xl" data-v0-t="card">
                            <form method="POST" action=" {{ route('admin.students.completeaza') }}">
                                @csrf
                                <input type="hidden" name="departament_id" value="{{$departament->id}}">
                                <input type="hidden" name="facultate_id" value="{{$facultate->id}}">

                                <div class="p-6 flex flex-row items-center justify-between pb-2 space-y-0">
                                    <h3 class="tracking-tight text-base font-base dark:text-gray-200">{{$departament->departament_name}}</h3>
                                </div>
                                <div class="p-6">
                                    <div class="text-2xl font-bold dark:text-gray-200"> {{$inscrisiCount}} /
                                        @foreach($locuriAdmitere as $locAdmitere)
                                            @if($locAdmitere->name == strtolower($departament->departament_name))
                                               @php
                                                if($locAdmitere->value == $admisCount) {
                                                    $isFull=1;
                                                } else {
                                                    $isFull=0;
                                                }
                                               @endphp

                                                {{ $locAdmitere->value }}
                                            @endif
                                        @endforeach
                                    </div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">Studenti Inscrisi / Locuri disponibile</p>
                                    <div class="text-2xl font-bold dark:text-gray-200">{{$admisCount}}</div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Studenti confirmati</p>
                                    @if($isFull == 0)
                                        <div class="pt-2 flex justify-center">
                                            <button type="submit" class="px-4 py-2 bg-cyan-700 hover:bg-cyan-500 rounded-md text-white">
                                                Completeaza Locuri
                                            </button>
                                        </div>

                                    @elseif($isFull == 1)
                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400 pt-5">Locurile au fost ocupate</p>
                                    @endif

                                </div>
                            </form>
                        </div>
                            @php
                                $inscrisiCount = 0;
                                $admisCount = 0;
                                $isFull = 0;
                            @endphp
                    @endif
                @endforeach

            </div>

        @endforeach
    </div>


</div>
