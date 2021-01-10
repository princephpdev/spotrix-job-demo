<x-guest-layout>
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Welcome to the Spotrix Job Portal</h1>
      <p class="mb-8 leading-relaxed">Please Login using email id Or register on portal before Applying for job </p>
      @if (Route::has('login'))
      <div class="flex justify-center">
      @auth
      <a href="{{ route('dashboard') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</a>
        <a href="{{ route('register') }}" class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Register</a>
      @endauth
      </div>
      @endif
    </div>
  </div>
</section>
</x-guest-layout>
