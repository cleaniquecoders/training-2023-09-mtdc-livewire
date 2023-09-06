<x-guest-layout>
    <div class="min-h-screen">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <h1 class="text-3xl mb-4">
                    Tooltip
                </h1>
                <div>

                    <!-- Tippy.js -->
                    <!-- https://atomiks.github.io/tippyjs/v6 -->
                    <script src="https://unpkg.com/@popperjs/core@2"></script>
                    <script src="https://unpkg.com/tippy.js@6"></script>

                    <!-- Usage -->
                    <div class="flex items-center justify-center gap-2">
                        <button x-data x-tooltip="I am a tooltip!" type="button"
                            class="rounded-md bg-white px-5 py-2.5 shadow">
                            Hover over me
                        </button>

                        <button x-data @click="$tooltip('I am a tooltip!')" type="button"
                            class="rounded-md bg-white px-5 py-2.5 shadow">
                            Click me
                        </button>
                    </div>

                    <!-- Source -->
                    <script>
                        document.addEventListener('alpine:init', () => {
                            // Magic: $tooltip
                            Alpine.magic('tooltip', el => message => {
                                let instance = tippy(el, {
                                    content: message,
                                    trigger: 'manual'
                                })

                                instance.show()

                                setTimeout(() => {
                                    instance.hide()

                                    setTimeout(() => instance.destroy(), 150)
                                }, 2000)
                            })

                            // Directive: x-tooltip
                            Alpine.directive('tooltip', (el, {
                                expression
                            }) => {
                                tippy(el, {
                                    content: expression
                                })
                            })
                        })
                    </script>
                </div>
                <hr class="my-4">

                <h1 class="text-3xl mb-4">Toggle</h1>
                <div>

                    <!-- Toggle -->
                    <div x-data="{ value: false }" class="flex items-center justify-center" x-id="['toggle-label']">
                        <input type="hidden" name="sendNotifications" :value="value">

                        <!-- Label -->
                        <label @click="$refs.toggle.click(); $refs.toggle.focus()" :id="$id('toggle-label')"
                            class="text-gray-900 font-medium">
                            Send notifications
                        </label>

                        <!-- Button -->
                        <button x-ref="toggle" @click="value = ! value" type="button" role="switch"
                            :aria-checked="value" :aria-labelledby="$id('toggle-label')"
                            :class="value ? 'bg-slate-400' : 'bg-slate-300'"
                            class="relative ml-4 inline-flex w-14 rounded-full py-1 transition">
                            <span :class="value ? 'translate-x-7' : 'translate-x-1'"
                                class="bg-white h-6 w-6 rounded-full transition shadow-md" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <hr class="my-4">

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
