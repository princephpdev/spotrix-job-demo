<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                @if(Auth::user()->isAdmin())
                <a href="{{route('job.create')}}" class="flex md:w-1/4 w-1/2 mb-6 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    Create new job
                </a>
                @endif
                    <table class="min-w-full divide-y divide-gray-200 text-left">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Job Profile
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Published At
                        </th>
                        @if(Auth::user()->isAdmin())
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No. of Applicants
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                        @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($allJobs as $job)
                        @if($job->status || (Auth::user()->isAdmin()))
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <a href="{{ route('job.show', $job->slug)}}">{{$job->title}}</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$job->created_at->diffForHumans()}}
                            </div>
                        </td>
                        @if(Auth::user()->isAdmin())
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{($job->status)?'Active':'Inactive'}}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <a href="{{ route('job.show', $job->slug)}}">{{$job->users_count}}</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{route('job.edit', $job->slug)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form class="inline-block" action="{{ route('job.destroy', $job->slug) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                            </form>
                        </td>
                        @endif
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="p-4 mt-4">
                        {{$allJobs->links()}}
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>