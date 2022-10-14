@props(['type'])

<a href="/types/{{ $type->slug }}"
    class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
    style="font-size: 10px">{{ $type->name }}</a>