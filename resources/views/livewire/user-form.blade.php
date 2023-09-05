<div>
    <form wire:submit="save">
        <div class="p-4">
            <div class="my-2">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="name" />
                @error('name')
                    <span class="text-red-700 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-2">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input class="block mt-1 w-full" type="email" wire:model="email" />
                @error('email')
                    <span class="text-red-700 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-2">
                <x-label for="languages" value="{{ __('Language') }}" />
                <div class="flex">
                    <x-input class="block mt-1" type="checkbox" wire:model="languages" value="Malay" />
                    <span class="ml-2">Malay</span>
                </div>
                <div class="flex">
                    <x-input class="block mt-1" type="checkbox" wire:model="languages" value="English" />
                    <span class="ml-2">English</span>
                </div>
                @error('languages')
                    <span class="text-red-700 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-2">
                <x-label for="gender" value="{{ __('Gender') }}" />
                <div class="flex">
                    <x-input class="block mt-1" type="radio" wire:model="gender" value="Male" />
                    <span class="ml-2">Male</span>
                </div>
                <div class="flex">
                    <x-input class="block mt-1" type="radio" wire:model="gender" value="Female" />
                    <span class="ml-2">Female</span>
                </div>
                @error('gender')
                    <span class="text-red-700 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-2">
                <x-label for="photo" value="{{ __('Photo') }}" />
                <x-input class="block mt-1" type="file" wire:model="photo" />
                @error('photo')
                    <span class="text-red-700 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-2 flex justify-end">
                <x-button>
                    Save
                </x-button>
            </div>
        </div>
    </form>

    <hr>
    <div class="my-2">
        <h1 class="font-bold">Summary</h1>
        <ol>
            <li>Name: <span x-text="$wire.name"></span></li>
            <li>Language: <span x-text="$wire.languages"></span></li>
            <li>Gender: <span x-text="$wire.gender"></span></li>
        </ol>

    </div>
</div>
