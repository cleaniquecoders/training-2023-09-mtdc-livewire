<x-guest-layout>
    <div class="min-h-screen">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


                <h1 class="text-3xl mb-4">Modal</h1>

                <div x-data="{ open: false }" class="flex justify-center">
                    <!-- Trigger -->
                    <span x-on:click="open = true">
                        <button type="button" class="rounded-md bg-white px-5 py-2.5 shadow">
                            Open dialog
                        </button>
                    </span>

                    <!-- Modal -->
                    <div x-show="open" style="display: none" x-on:keydown.escape.prevent.stop="open = false"
                        role="dialog" aria-modal="true" x-id="['modal-title']" :aria-labelledby="$id('modal-title')"
                        class="fixed inset-0 z-10 overflow-y-auto">
                        <!-- Overlay -->
                        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

                        <!-- Panel -->
                        <div x-show="open" x-transition x-on:click="open = false"
                            class="relative flex min-h-screen items-center justify-center p-4">
                            <div x-on:click.stop x-trap.noscroll.inert="open"
                                class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg">
                                <!-- Title -->
                                <h2 class="text-3xl font-bold" :id="$id('modal-title')">Confirm</h2>

                                <!-- Content -->
                                <p class="mt-2 text-gray-600">Are you sure you want to learn how to create an awesome
                                    modal?</p>

                                <!-- Buttons -->
                                <div class="mt-8 flex space-x-2">
                                    <button type="button" x-on:click="open = false"
                                        class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                                        Confirm
                                    </button>

                                    <button type="button" x-on:click="open = false"
                                        class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <h1 class="text-3xl mb-4">Counter</h1>
                <div x-data="{ count: 0 }" class="flex items-center">

                    <x-button x-on:click="count++">Increment</x-button>

                    <span class="ml-2 text-xl font-medium" x-text="count"></span>
                </div>

                <hr class="my-4">

                <h1 class="text-3xl mb-4">Dropdown</h1>

                <div x-data="{ open: false }">
                    <x-button @click="open = ! open">Toggle</x-button>

                    <div x-show="open" @click.outside="open = false" class="p-4 border rounded border-gray-400 my-4">
                        <ol>
                            <li>1. Item 1</li>
                            <li>2. Item 2</li>
                            <li>3. Item 3</li>
                            <li>4. Item 4</li>
                            <li>5. Item 5</li>
                        </ol>
                    </div>
                </div>

                <hr class="my-4">

                <h1 class="text-3xl mb-4">Search Input</h1>

                @php
                    $data = [];

                    for ($i = 0; $i < rand(25, 100); $i++) {
                        $data[] = rand(1, 250) . '.' . rand(1, 250) . '.' . rand(1, 250) . '.' . rand(1, 250);
                    }
                @endphp

                <div x-data="{
                    search: '',

                    items: {{ json_encode($data) }},

                    get filteredItems() {
                        return this.items.filter(
                            i => i.startsWith(this.search)
                        )
                    }
                }">
                    <x-input x-model="search" placeholder="Search..." />

                    <ul class="my-4">
                        <template x-for="item in filteredItems" :key="item">
                            <li class="my-2">
                                <x-input type="checkbox" />
                                <span x-text="item"></span>
                            </li>
                        </template>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>