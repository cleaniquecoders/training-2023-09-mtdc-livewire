<div>

    <x-authentication-card>
        <x-slot name="logo">
            Feedback form for {{ config('app.name') }}
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit="save">

            <div class="my-2">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.name" required />
            </div>

            <div class="my-2">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input class="block mt-1 w-full" type="email" wire:model="state.email" required />
            </div>

            <div class="my-2">
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.title" required />
            </div>

            <div class="my-2">
                <x-label for="content" value="{{ __('Feedback') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.content" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</div>
