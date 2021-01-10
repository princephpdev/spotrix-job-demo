<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        @foreach($singleJob as $job)
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="flex flex-col text-center w-full mb-20">
                                    <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">
                                        {{$job->created_at->diffforhumans()}} , Updated : {{$job->updated_at->diffforhumans()}}
                                    </h2>
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                                        {{$job->title}}
                                    </h1>
                                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                                        {{$job->body}}
                                    </p>
                                    @livewire('apply-for-jobs', ['slug' => $job->slug])
                                </div>
                            </div>
                        </section>
                        <div class="p-4 bg-gray-50">
                            <h2 class="text-bold text-xl">List of users applied for the job</h2>
                            @if(count($job->users) > 0)
                            <ol>
                                @foreach($job->users as $user)
                                <li class="p-4 m-2 shadow-sm cursor-pointer">
                                    <a href="{{route('user.show' , $user->email)}}">{{$user->name}}</a>
                                </li>
                            </ol>
                            @endforeach
                            @else
                            No User applied for the job yet !!
                            @endif
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>