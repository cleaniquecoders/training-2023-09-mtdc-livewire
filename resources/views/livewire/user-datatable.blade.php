<div>
    <div class="my-4 flex justify-between">
        <x-input class="block mt-1" placeholder="Search Keyword" type="text" wire:model.live="search" />

        <div class="flex justify-end">
            @if ($selectedRows)
                <select placeholder="User Type"
                    wire:model.live="markAction"
                    class="mr-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <option disabled selected>Please select action</option>
                    <option value="0">Mark as Verfied</option>
                    <option value="1">Mark as Non-Verified</option>
                </select>
            @endif

            <select wire:model.live="isVerified" placeholder="User Type"
                class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                <option value="">All</option>
                <option value="1">Verfied</option>
                <option value="2">Non-Verified</option>
            </select>
        </div>
    </div>
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">
                        <input type="checkbox" wire:model.live="selectAllCurrentPage" class="mx-2" />
                    </th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                        <x-sortable field="name" :sortBy="$sortBy" :sortDir="$sortDir" title="Name" />
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                        <x-sortable field="email" :sortBy="$sortBy" :sortDir="$sortDir" title="E-mail" />
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                        <x-sortable field="email_verified_at" :sortBy="$sortBy" :sortDir="$sortDir" title="Verified At" />
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                        <x-sortable field="created_at" :sortBy="$sortBy" :sortDir="$sortDir" title="Joined At" />
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900 text-center">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @foreach ($users as $user)
                    <tr>
                        {{-- need to handle..if the id belongs to current, on select the item --}}
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            <input type="checkbox" wire:model.live="selectedRows" value="{{ $user->id }}"
                                class="mx-2" />
                        </td>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            {{ $user->name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email_verified_at }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->created_at }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 justify-center flex">
                            <x-secondary-button class="mx-2">
                                View
                            </x-secondary-button>
                            <x-button class="mx-2">
                                Update
                            </x-button>
                            <x-button class="bg-red-700 mx-2">
                                Delete
                            </x-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex  justify-between mt-4">
        <select wire:model.live="perPage"
            class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        {{ $users->links() }}
    </div>
</div>
