<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class Show extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.roles.show' , [
            'roles' => Role::all(),
        ]);
    }

    protected $rules = [
        'name' => 'required|unique:roles|min:3|max:50', // 1MB Max
    ];

    public function addNewRole()
    {
        $this->resetErrorBag();
        $this->validate();
        Role::create([
            'name' => $this->name,
        ]);
        $this->emit('saved');
        $this->emit('refresh-navigation-menu');
    }

    public function deleteRole($id)
    {
        Role::find($id)->delete();
        $this->emit('deleted');
        $this->emit('refresh-navigation-menu');
    }
}
