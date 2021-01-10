<div>

        <x-jet-form-section submit="addNewRole">
            <x-slot name="title">
                {{ __('Add New Role') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Ensure the name should be Unique') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Role Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" autocomplete="name" wire:model.defer="name"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>     
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Added.') }}
                </x-jet-action-message>

                <x-jet-button>
                    {{ __('Add') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>

    <h1 class="text-xl p-4 my-4 font-bold"> List of All Roles</h1>
    <x-jet-action-message class="mr-3" on="deleted">
    <p class="p-4 my-2 bg-red-50">
        Deleted Succesfully
    </p>
     </x-jet-action-message>
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Role Name
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-center">
            @foreach($roles as $role)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{$role->name}}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <x-jet-danger-button wire:click="deleteRole({{$role->id}})">
                        {{ __('Delete')}}
                    </x-jet-danger-button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>