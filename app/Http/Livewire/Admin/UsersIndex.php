<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->search .'%')
        ->onWhere('email','LIKE','%'.$this->search .'%')
        ->paginate();
        return view('livewire.admin.users-index',compact('users'));
    }
}
