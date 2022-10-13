

<x-layout>

@include('property._header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @if ($posts->count())
        <x-post-grid :posts="$posts"/>
    @else
        <p class="center">No Posts Yet! Please Check Back Later</p>
        <br>
        <a href="/" > Back to Homepage </a>
    @endif
        </main>

    {{-- <!-- Initial View: Temporarily Commented --> --}}

 {{-- @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/property/{{$post->slug}}">
            {{$post->title}}
            </a>
        </h1>

        <div>
            {{$post->excerpt}}
        </div>

        <p>
            <a href="/categories/{{ $post->category->slug }}">{{$post->category->name}}</a>
            <a href="/types/{{ $post->type->slug }}">{{$post->type->name}}</a>
        </p>
    </article>
    @endforeach --}}
</x-layout>


