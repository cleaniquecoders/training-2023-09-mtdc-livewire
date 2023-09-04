<div>

    <x-authentication-card>
        <x-slot name="logo">
            Support form for {{ config('app.name') }}
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
                <x-input class="block mt-1 w-full" type="text" wire:model="state.name" />
            </div>

            <div class="my-2">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input class="block mt-1 w-full" type="email" wire:model="state.email" />
            </div>

            <div class="my-2">
                <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.phone_number" />
            </div>

            <div class="my-2">
                <x-label for="description" value="{{ __('Description') }}" />
                <x-input class="block mt-1 w-full" type="text" wire:model="state.description" />
            </div>

            <div class="my-2">
                <x-label for="urgency_level" value="{{ __('Urgency Level') }}" />
                <select wire:model="state.urgency_level"
                    class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <option value="1">High</option>
                    <option value="5">Medium</option>
                    <option value="9">Low</option>
                </select>
            </div>

            <div class="my-2">
                <x-label for="type" value="{{ __('Support Type') }}" />
                <select wire:model="state.type"
                    class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <option value="New Order">New Order</option>
                    <option value="Delivery of product">Delivery of product</option>
                    <option value="Billing or Charge">Billing or Charge</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="my-2">
                <x-label for="contact_by" value="{{ __('Contact By') }}" />
                <select wire:model="state.contact_by"
                    class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <option value="E-mail">Email</option>
                    <option value="Phone">Phone</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</div>
