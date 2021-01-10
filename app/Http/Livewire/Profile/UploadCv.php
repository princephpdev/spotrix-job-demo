<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadCv extends Component
{
    use WithFileUploads;

    public $resume;

    public function render()
    {
        return view('livewire.profile.upload-cv');
    }

    protected $rules = [
        'resume' => 'file|mimes:pdf,doc,docx,jpg|max:1024', // 1MB Max
    ];

    protected $messages = [
        // 'resume.required' => 'The Resume cannot be empty.',
        'resume.mimes' => 'The Resume format is not valid.',
        'resume.max' => 'Size should be less than 1 Mb',
    ];

    protected $validationAttributes = [
        'resume' => 'resume'
    ];

    public function updateResume()
    {
        $this->resetErrorBag();
        $this->validate();
        // $this->resume->store('resume');
        $path =$this->resume->storePublicly('resumes',['disk' => $this->profilePhotoDisk()]);
        $user = Auth::user();
        $user->resume_path = $path;
        $user->save();
        $this->emit('saved');
        $this->emit('refresh-navigation-menu');
    }

    public function export($cv)
    {
        return Storage::disk($this->profilePhotoDisk())->download($cv);
    }

    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }

}
