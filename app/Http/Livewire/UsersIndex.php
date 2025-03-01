<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $users = $users = User::all();
        // $users = User::where('name', 'LIKE', '%' . $this->search . '%')->paginate();
        return view('livewire.users-index',compact('users'));
    }
}
