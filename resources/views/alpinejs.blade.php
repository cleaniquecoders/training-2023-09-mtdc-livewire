<x-guest-layout>
    <div class="min-h-screen">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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

                    for ($i=0; $i < rand(25, 100); $i++) {
                        $data[] = rand(1,250).'.'.rand(1,250).'.'.rand(1,250).'.'.rand(1,250);
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
                            <li class="my-2" >
                                <x-input type="checkbox"  />
                                <span x-text="item"></span>
                            </li>
                        </template>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
