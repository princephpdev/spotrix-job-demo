<div class ='md:grid md:grid-cols-3 md:gap-6'>
    <x-jet-section-title>
    <x-slot name="title">
        {{ __('Update CV') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure file must be pdf , doc, docx or jpg And should not be larger than 1 Mb') }}
    </x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="updateResume">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                    
                    <div class="col-span-6 sm:col-span-4"
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <input type="file" wire:model="resume">
                        <!-- errors -->
                        <x-jet-input-error for="resume" class="mt-2" />
                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                    </div> 
                </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                    </div>
            </div>
        </form>
        @if(!empty(Auth::user()->resume_path))
        <div class="col-span-6 sm:col-span-4">
            <x-jet-secondary-button wire:click="export('{{Auth::user()->resume_path}}')">
                Download Your Resume
            </x-jet-secondary-button>
        </div>
        @endif
    </div>
</div>