<div>
    Hey this is Counter Component

    {{ $count }}

    <div>{{ $message }}</div>

    <button wire:click="increment">Increment</button>

    <div>
        <input type="text" wire:model="userName" name="userName">
    </div>

</div>

