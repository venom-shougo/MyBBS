<x-layout>
    <x-slot name="title">
        {{ $post }} - My BBS
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="btn">[x]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <h2>Comments</h2>
    <ul>
        <li>
            <form action="{{ route('comments.store', $post) }}" method="post" class="comment-form">
                @csrf

                <input type="text" name="body">
                <button>Add</button>
            </form>
        </li>
        {{-- コメントを後順 PostControlerのletest()を呼び出す --}}
        @foreach ($post->comments()->latest()->get() as $comment)
            <li>
                {{ $comment->body }}
            </li>

        @endforeach
    </ul>

    <script>
        'use strict';
        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('Sure to delete?')) {
                    return;
                }

                e.target.submit();
            });
        }
    </script>
</x-layout>

