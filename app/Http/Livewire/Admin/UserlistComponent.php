<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UserlistComponent extends Component
{   use WithPagination;

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('message','User deleted');
    }

    public function render()
    {
        $userlist = User::paginate(5);
        return view('livewire.admin.userlist-component',['userlist'=>$userlist])->layout('layouts.base');
    }
}
