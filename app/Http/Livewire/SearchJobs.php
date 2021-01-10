<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class SearchJobs extends Component
{
    public $search = '';
    public $jobs = [];

    public function render()
    {
        return view('livewire.search-jobs');
    }

    protected $rules = [
        'search' => 'required|min:3|max:100', // 1MB Max
    ];

    // $item = '%'.$this->search.'%';
    //     $this->jobs = Job::where('title', 'like', $item)->get();

    public function searchJob()
    {
        $this->resetErrorBag();
        $this->validate();
        $this->jobs = Job::where('title', 'like', '%'.$this->search.'%')
        ->where('status' , 1)
        ->get();
        $this->reset('search');
        if(count($this->jobs) < 1){
            session()->flash('message', 'No Data found.');
        }
    }
}
