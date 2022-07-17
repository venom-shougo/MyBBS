<x-layout>
    <x-slot name="title">
        Add New Post - My BBS
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>

    <h1> Add New Post</h1>

    <form  method="post" action="">
        @csrf
        <label>
            Title
            <input type="text" name="title">
        </label>
        <label>
            Body
            <textarea name="body"></textarea>
        </label>
        <button>Add</button>
    </form>
</x-layout>
