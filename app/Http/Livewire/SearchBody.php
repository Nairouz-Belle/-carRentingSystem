<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vehicule;
use Livewire\WithPagination;


class SearchBody extends Component
{
    public $search='';
    

    


    public function render()
    {   
        return view('livewire.search-body', [
            'cars' => $this->search === null ?
                Vehicule::latest()->paginate($this->paginate) :
                Vehicule::latest()->where('carName', 'like', '%'.$this->search.'%')->get()
        ]);
    }
}
