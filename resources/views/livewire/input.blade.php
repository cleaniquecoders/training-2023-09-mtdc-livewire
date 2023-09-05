<div>
    <div class="my-2">
        <x-label for="name" value="{{ __('Name') }}" />
        <x-input class="block mt-1 w-full" type="text" wire:model="name" />
        <h2 x-text="$wire.name"></h2>
    </div>
</div>
