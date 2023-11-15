<x-guest-layout>

    <div class="h-screen flex flex-row">
        <div class="w-1/3 h-full hidden md:block sm:hidden" style="background-color: #22A699; ">
            
            <div class="flex flex-col h-full justify-center items-center">
                @if (session('success'))
                    <div 
                        class="mb-4 rounded-md bg-white border border-white-400 px-6 py-2 text-cyan-900 w-4/5  text-center"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h1 class="text-5xl font-medium text-white py-7 text-center">Welcome Back!</h1>
                <div class="text-lg text-center text-white">
                    <p>Untuk tetap terhubung pada kami</p>
                    <p>masuk dengan akun kamu</p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-2/3 h-full flex flex-col">
           
            <div class="h-1/2 w-full flex flex-col justify-center items-center py-10" x-data="{ show: false }">
                
                <h1 class="text-3xl sm:text-5xl font-medium" style="color: #22A699;">Masuk ke Inventory</h1>
            </div>

            <div class="h-1/2 h-full flex justify-center" x-on:click="show = ! show">
                <form method="POST" action="{{ route('login') }}" class="flex flex-col w-1/2 items-center">
                    @error('email')
                        <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                            Password atau email salah
                        </div>
                    @enderror
                    @error('password')
                        <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                            Password atau email salah
                        </div>
                    @enderror
                    @csrf

                    <!-- Email Address -->
                    <div class="relative w-full mb-3">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="email" placeholder="Email" class="py-3 px-2 w-full bg-gray-200 border-0" />
                    </div>

                    <!-- Password -->
                    <div class="relative w-full" x-data="{ showPassword: false }">
                        <input id="password" x-bind:type="showPassword ? 'text' : 'password'" name="password" required
                            autocomplete="current-password" placeholder="Password"
                            class="py-3 px-2 w-full bg-gray-200 border-0" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button type="button" x-on:click="showPassword = !showPassword" id="togglePassword"
                                class="text-gray-400 focus:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button class="rounded-full w-5/12 p-4 text-white mt-10 text-xs md:text-md"
                        style="background-color: #22A699;">
                        {{ __('SIGN IN') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
