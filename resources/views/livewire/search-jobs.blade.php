<div>
    <form wire:submit.prevent="searchJob">
        <input type="text" wire:model.defer="search" class="w-full m-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="search" placeholder="Search jobs..." />
        <x-jet-input-error for="search" class="mt-2" />
        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
            <x-jet-button>
                {{ __('Search') }}
            </x-jet-button>
        </div>
    </form>
    <div class="mt-8 p-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Search Results
        </h2>
        @if(!empty($jobs))
        <table class="min-w-full divide-y divide-gray-200 text-left mt-4">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($jobs as $job)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <a href="{{ route('job.show', $job->slug)}}">{{$job->title}}</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @if (session()->has('message'))
        <div class="flex items-center px-4 py-3 sm:px-6">
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>