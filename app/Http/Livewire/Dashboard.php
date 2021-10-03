<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        return view('livewire.dashboard', [
            //'transactions' => Transaction::all(), // search is a macro in AppServiceProvider
            'transactions' => Transaction::where('title', 'like', '%'.$this->search.'%')->paginate(10), // search is a macro in AppServiceProvider
            //'transactions' => Transaction::search('title', $this->search)->paginate(10), // search is a macro in AppServiceProvider
        ]);
    }
}
