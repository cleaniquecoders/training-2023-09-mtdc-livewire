<x-guest-layout>
    <div class="min-h-screen">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <h1 class="text-3xl mb-4">Tab</h1>

                <div>

                    <!-- Tabs -->
                    <div x-data="{
                        selectedId: null,
                        init() {
                            // Set the first available tab on the page on page load.
                            this.$nextTick(() => this.select(this.$id('tab', 1)))
                        },
                        select(id) {
                            this.selectedId = id
                        },
                        isSelected(id) {
                            return this.selectedId === id
                        },
                        whichChild(el, parent) {
                            return Array.from(parent.children).indexOf(el) + 1
                        }
                    }" x-id="['tab']" class="mx-auto max-w-3xl">
                        <!-- Tab List -->
                        <ul x-ref="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                            @keydown.home.prevent.stop="$focus.first()" @keydown.page-up.prevent.stop="$focus.first()"
                            @keydown.left.prevent.stop="$focus.wrap().prev()" @keydown.end.prevent.stop="$focus.last()"
                            @keydown.page-down.prevent.stop="$focus.last()" role="tablist"
                            class="-mb-px flex items-stretch">
                            <!-- Tab -->
                            <li>
                                <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                                    @click="select($el.id)" @mousedown.prevent @focus="select($el.id)" type="button"
                                    :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                                    :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                                    class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5"
                                    role="tab">Tab 1</button>
                            </li>

                            <li>
                                <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                                    @click="select($el.id)" @mousedown.prevent @focus="select($el.id)" type="button"
                                    :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                                    :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                                    class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5"
                                    role="tab">Tab 2</button>
                            </li>
                        </ul>

                        <!-- Panels -->
                        <div role="tabpanels" class="rounded-b-md border border-gray-200 bg-white">
                            <!-- Panel -->
                            <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                                :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                                class="p-8">
                                <h2 class="text-xl font-bold">Tab 1 Content</h2>
                                <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Optio, quo sequi error quibusdam quas temporibus animi sapiente eligendi! Deleniti
                                    minima velit recusandae iure.</p>
                                <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something
                                    focusable</button>
                            </section>

                            <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                                :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                                class="p-8">
                                <h2 class="text-xl font-bold">Tab 2 Content</h2>
                                <p class="mt-2 text-gray-500">Fugiat odit alias, eaque optio quas nobis minima
                                    reiciendis voluptate dolorem nisi facere debitis ea laboriosam vitae omnis ut
                                    voluptatum eos. Fugiat?</p>
                                <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something else
                                    focusable</button>
                            </section>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

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

                    <div x-show="open" @click.outside="open = false"
                        class="p-4 border rounded border-gray-400 my-4">
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
