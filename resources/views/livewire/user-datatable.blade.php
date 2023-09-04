<div>
    <div class="my-4">
        <x-input class="block mt-1" placeholder="Search Keyword" type="text" wire:model.live="search" />
    </div>
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">E-mail</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                @foreach ($users as $user)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            {{ $user->name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <x-secondary-button>
                                View
                            </x-secondary-button>
                            <x-button>
                                Update
                            </x-button>
                            <x-button class="bg-red-700">
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
