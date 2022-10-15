@props(['posts'])

<!-- major article -->
{{-- <x-post-featured-card :post="$posts->first()"/> --}}

    @if ($posts->count() > 1 )
    <div class="lg:grid lg:grid-cols-6">
        <!-- Next Grid 2X2 -->
        @foreach ($posts as $post)
        <x-property-edit :post="$post" 
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>
    @endif