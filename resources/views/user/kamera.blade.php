<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
<div class="container my-4">
    @foreach ($posts as $post) 
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <h1 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h1>

        <div class="text-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | {{$post->created_at->diffForHumans()}}
        </div>

        <p class="my-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="text-blue-500">Readmore &raquo;</a>
    </article>
    @endforeach
</div>
</x-layout>