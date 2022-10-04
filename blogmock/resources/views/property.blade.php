<x-layout>

        @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/property/{{$post->slug}}">
                {{$post->title}}
                </a>
            </h1>
            <div>
                {{$post->excerpt}}
            </div>
        </article>
        @endforeach

</x-layout>


