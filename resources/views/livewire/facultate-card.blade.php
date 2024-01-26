<div>
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm w-[300px] h-[460px] max-w-md" >
        <div class="flex flex-col space-y-1.5 p-6">
            <h3 class="text-2xl font-semibold leading-none tracking-tight dark:text-gray-200">{{$facultate->facultate_name}}</h3>
        </div>
        <div class="p-6">
            <img
                src="{{ asset('images/' . $facultate->facultate_name . '.png') }}"
                alt="Facultate Image"
                width="300"
                height="200"
                class="aspect-[3/2] overflow-hidden rounded-lg object-contain"
            />
        </div>
        <div class="flex items-center p-6">
            <button wire:click="veziMaiMulte({{ $facultate->id }}" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                See More
            </button>
        </div>
    </div>
</div>
