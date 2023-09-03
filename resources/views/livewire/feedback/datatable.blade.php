<div>
    {{-- Add filters --}}
    {{-- Add mark as read --}}
    {{-- Add multiple select --}}
    {{-- Add row click --}}

    <div class="flex justify-between my-2 items-center">
        <x-input type="text" placeholder="Search" wire:model.live.debounce.300ms="search" />

    </div>

    <div class="shadow overflow-y-scroll border-b border-gray-200 dark:border-gray-700 sm:rounded-lg my-4">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
            <tr class=" dark:bg-gray-900 dark:opacity-60">
                <th
                    class="px-6 py-3 text-left text-sm font-bold whitespace-nowrap text-gray-700 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                    <span class="relative flex items-center cursor-pointer" wire:click="setSort('name')">
                        Name
                        @if ($sortDir === 'asc')
                            <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                                </path>
                            </svg>

                            <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        @elseif ($sortDir === 'desc')
                            <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        @else
                            <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                                </path>
                            </svg>
                        @endif
                    </span>
                </th>
                <th
                    class="px-6 py-3 text-left text-sm font-bold whitespace-nowrap text-gray-700 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">


                    <span class="relative flex items-center cursor-pointer" wire:click="setSort('title')">
                        Title
                        @if ($sortDir === 'asc')
                            <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                                </path>
                            </svg>

                            <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        @elseif ($sortDir === 'desc')
                            <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        @else
                            <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 15l7-7 7 7"></path>
                            </svg>
                        @endif
                    </span>
                </th>
                <th
                    class="px-6 py-3 text-left text-sm font-bold whitespace-nowrap text-gray-700 uppercase tracking-wider dark:bg-gray-800 dark:text-gray-400">
                    Actions

                </th>
            </tr>
            @foreach ($feedbacks as $feedback)
                <tr class="bg-white dark:bg-gray-700 dark:text-white" wire:key="{{ $feedback->id }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">{{ $feedback->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">{{ $feedback->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white">
                        <x-button
                            onclick="confirm('are sure wna to delete {{ $feedback->title }} ? ') || event.stopImmediatePropagation()"
                            wire:click="delete('{{ $feedback->id }}')">Delete</x-button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="flex justify-between my-2 items-center">
        <select wire:model.live.debounce.300ms="perPage"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
            <option value="5">5</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>

        {{ $feedbacks->links('pagination::tailwind') }}
    </div>
</div>
