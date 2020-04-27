<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="post">
        @csrf
        <textarea name="body" id="body" class="w-full" placeholder="What's Happening?">
            {{ old('body') }}
        </textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" class="rounded-full mr-2">

            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white">Tweet</button>
        </footer>

    </form>

    @error('body')
        <p class="text-red-600 text-xs mt-3">{{ $message }}</p>
    @enderror

</div>