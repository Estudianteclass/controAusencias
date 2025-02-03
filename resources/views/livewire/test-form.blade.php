<div>
    <div>
        <form wire:submit.prevent="submit">
            <input type="text" wire:model="name" placeholder="Enter your name" required>
            <button type="submit">Submit</button>
        </form>
    
        @if (session('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>
</div>
