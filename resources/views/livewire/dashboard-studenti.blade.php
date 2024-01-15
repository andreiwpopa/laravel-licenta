<div>
    <section>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 text-center mb-5">Panou Principal - Studenti</h1>
        <div class="flex gap-5 flex-wrap mx-auto justify-center">
            @foreach($facultati as $facultate)
                <livewire:facultate-card :$facultate :key="$facultate->id"/>
            @endforeach
        </div>
    </section>
</div>
