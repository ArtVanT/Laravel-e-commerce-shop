<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Admin extends Component
{

    // public User $user;
    public $users;

    public function mount()
    {
        $this->users = User::with('items')->get();


    }

    public function render()
    {
        return view('livewire.admin');
    }
}
