@livewireStyles
<div>
    <input wire:model="search" type="text" class="" placeholder="Search Post"/>

    @foreach($cars as $car)
        {{$car->carName}}
    @endforeach
</div>
@livewireScripts