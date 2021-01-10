<div>
    <x-jet-action-message class="mr-3 shadow-sm p-4 text-xl text-bold" on="saved">
        {{ __(' Applied Successfully') }}
    </x-jet-action-message>
   @if($count > 0)
        <h1 class="p-3 text-xl font-bold shadow-sm">Already applied for the job</h1>
        <p class="p-2">Please wait, you will get contacted soon</p>
   @else
    <x-jet-secondary-button wire:click="applyForJob()" wire:loading.remove>
        {{ __('Apply') }}
    </x-jet-secondary-button>
    @endif
</form>
</div>