<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <!-- Create Form Section -->
                  <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Create new Job</h1>
                      </div>
                      
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <!-- errors -->
                      
                      @foreach($errors->all() as $error)
                      <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-purple-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                          <i class="fas fa-bell" />
                        </span>
                        <span class="inline-block align-middle mr-8">
                          <b class="capitalize"> {{$error}} </b>
                        </span>
                      </div>
                      @endforeach
                      <form action="{{route('job.store')}}" method="POST">
                      @csrf
                        <div class="flex flex-wrap -m-2">
                          <div class="p-2 w-1/2">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                              <input type="text" id="title" name="title" value="{{old('title')}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-1/2">
                            <div class="relative">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                  <select id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option disabled selected>Select Any</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                  </select>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="body" class="leading-7 text-sm text-gray-600">Body</label>
                              <textarea id="body" name="body" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                {{old('body')}}
                              </textarea>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Create</button>
                          </div>
                          
                        </div>
                      </form>
                      </div>
                    </div>
                  </section>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>