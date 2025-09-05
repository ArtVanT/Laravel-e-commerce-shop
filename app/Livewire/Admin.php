<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Admin extends Component
{

    // public User $user;
    public $allUsers = [];
    public string $search = '';

    public function getUsersProperty(){
        if(!$this->search){
            return collect();
        }
        return User::query()
        ->where('name', 'like', "%{$this->search}%")
        ->orWhereHas('items', function ($q) {
            $q->where('item_name', 'like', "%{$this->search}%"); // match your column
        })
        ->with('items')
        ->get();
    }

    public function mount()
    {
       
        $this->allUsers = User::with('items')->get();
        


    }
    
    public function render()
    {
        return view('livewire.admin');
    }

   
    public function deleteUser(User $user){
        $user->delete();
        $this->allUsers = User::with('items')->get();
    }
   public string $restoreUserName = '';

public function restoreUser()
{
    $user = User::withTrashed()
        ->where('name', $this->restoreUserName)
        ->first();

    if ($user && $user->trashed()) {
        $user->restore();
        $this->allUsers = User::with('items')->get();
        $this->restoreUserName = '';
    }
}

}
