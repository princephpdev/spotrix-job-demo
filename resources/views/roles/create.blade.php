<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Role') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <x-jet-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('role.store') }}">
                                @csrf

                                <div>
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>

                                <div class="md:flex mb-6">
                                    <div class="md:w-1/3">
                                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-checkbox">
                                            Add Roles
                                        </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        @foreach($permission as $value)
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox text-indigo-600" name="permission[]" value="{{$value->id}}">
                                                <span class="ml-2">{{$value->name}}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('role.index') }}">
                                        {{ __('Changed Your mind?') }}
                                    </a>

                                    <x-jet-button class="ml-4">
                                        {{ __('Create') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>