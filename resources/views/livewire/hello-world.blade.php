<x-layouts.app>
    <div>
        Success is as dangerous as failure.
        <p>{{$message}}</p>
        <p>{{$greeting}}</p>

        <p>Counter : {{$counter}}</p>
        <button wire:click="increment">Increment</button>
        <button wire:click="decrement">Decrement</button>
    </div>
</x-layouts.app>
