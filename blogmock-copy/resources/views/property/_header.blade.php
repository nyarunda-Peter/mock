

<header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                <span class="text-blue-500">Mock Website</span>
            </h1>

            <p class="text-sm mt-4">
                Another year. Another update. We're refreshing to keep you guys up to speed with what's going on!
            </p>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
                <!--  Category -->
                <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

                    <x-category-dropdown/>

                </div>

                <!--  Type -->
                {{-- <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

                    <x-dropdown>
                        <x-slot name="trigger">
                            <button

                                class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-50 text-left flex lg:inline-flex">

                                {{ isset($current_category) ? ucwords($current_category->name) : 'Type'}}

                                <x-icon name="down-arrow" class="absolute pointer-events-none"  style="right: 12px;"/>
                            </button>
                        </x-slot>
                            <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

                            @foreach ($types as $type)

                            <x-dropdown-item
                                href="/types/{{ $type->slug }}"
                                :active='request()->is("types/{ $type->slug }")'
                            >
                                {{ ucwords($type->name)}}
                            </x-dropdown-item>

                            @endforeach
                    </x-dropdown>

                </div> --}}

                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="#">
                        <input type="text"
                        name="search"
                        placeholder="Find something"
                        class="bg-transparent placeholder-black font-semibold text-sm"
                        value="{{ request('search') }}">
                    </form>
                </div>
            </div>
        </header>
