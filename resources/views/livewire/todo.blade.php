<div>
    @foreach ($todos as $todo)
        <div class="flex justify-around my-2 items-center">
            <div wire:click="toggle({{ $todo->id }})" class="border-none hover:bg-gray-300 py-4 px-2 cursor-pointer">
                @if (!$todo->is_completed)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-red-700">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.25 7.5A2.25 2.25 0 017.5 5.25h9a2.25 2.25 0 012.25 2.25v9a2.25 2.25 0 01-2.25 2.25h-9a2.25 2.25 0 01-2.25-2.25v-9z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-green-700 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                @endif
            </div>
            <p class="ml-2 w-full font-medium {{ $todo->is_completed ? 'text-gray-300' : 'text-black' }}">
                {{ $todo->todo }}
            </p>
            <x-secondary-button onclick="confirm('Are you sure want to delete?') || event.stopImmediatePropagation()"
                wire:click="delete({{ $todo->id }})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-red-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </x-secondary-button>
        </div>
    @endforeach

    <hr>

    <div class="flex w-full justify-end my-2">

        <x-input class="block mt-1 w-full" type="text" wire:model="todo" wire:keydown.enter="add" />

        <div class="mx-2">
            <x-button class=" block py-3 mt-1" wire:click="add">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </x-button>
        </div>
    </div>
    <div>
        @error('todo')
            <span class="text-red-700 text-sm italic">{{ $message }}</span>
        @enderror
    </div>
</div>
