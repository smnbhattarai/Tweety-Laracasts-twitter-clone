<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}" alt="img" class="rounded-full mr-2" width="40" height="40">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ route('profile', $tweet->user) }}" class="text-blue-500">{{ $tweet->user->name }}</a>
        </h5>

        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>