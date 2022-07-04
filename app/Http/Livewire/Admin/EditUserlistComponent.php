<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class EditUserlistComponent extends Component
{
    public $user_email;
    public $user_id;
    public $name;
    public $type;
    public $email;

    public function mount($user_email){
        $this->user_email = $user_email;
        $user = User::where('email',$user_email)->first();
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->type = $user->type;
    }

//    public function generatesEmail(){
//        $this->email = Str::slug($this->email);
//    }

    public function updateUser(){
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->type = $this->type;
        $user->save();
        session()->flash('message', 'User updated');

    }

    public function render()
    {
        return view('livewire.admin.edit-userlist-component')->layout('layouts.base');
    }
}
