<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <p class="p-4 my-2 bg-red-50">
                {{ session('error') }}
            </p>
            @endif
            @livewire('search-jobs')
        </div>
    </div>
</x-app-layout>