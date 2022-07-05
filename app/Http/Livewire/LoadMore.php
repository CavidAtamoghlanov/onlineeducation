<?php

namespace App\Http\Livewire;

use App\Models\telimler;
use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class LoadMore extends Component
{


    public $title;
    public $page_number = 100;
    public function mount($id)
    {
        $this->title = $id;

    }



    public function render()
    {
        $telimler = telimler::where('telimci_id','=',$this->title)->paginate($this->page_number);
        return view('livewire.load-more',['telimler'=>$telimler]);
    }


}
