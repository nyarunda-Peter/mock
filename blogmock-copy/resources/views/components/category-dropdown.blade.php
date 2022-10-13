<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->

<x-dropdown>
    <x-slot name="trigger">
    <button

        class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-50 text-left flex lg:inline-flex">

        {{ isset($current_category) ? ucwords($current_category->name) : 'Category'}}

        <x-icon name="down-arrow" class="absolute pointer-events-none"  style="right: 12px;"/>
    </button>
    </x-slot>
    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category  )

    <x-dropdown-item
        href="/categories/{{ $category->slug }}"
        :active='request()->is("categories/{ $category->slug }")'
    >
        {{ ucwords($category->name)}}
    </x-dropdown-item>

    @endforeach
</x-dropdown>
