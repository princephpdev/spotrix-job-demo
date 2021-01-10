<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApplyForJobs extends Component
{
    public $slug;
    public $count;

    public function render()
    {
        $job_id = Job::where('slug', $this->slug)->first()->id;
        $user_id = Auth::id();
        $this->count = DB::table('job_user')
        ->where('user_id' , $user_id)
        ->where('job_id', $job_id)
        ->count();
        return view('livewire.apply-for-jobs');
    }

    public function applyForJob()
    {
        $job_id = Job::where('slug', $this->slug)->first()->id;
        Auth::user()->jobs()->attach([$job_id]);
        $this->emit('saved');
        $this->emit('refresh-navigation-menu');
    }
}
