<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="py-10 px-7">
        @csrf

        <!-- Email Address -->

        <a href="#" class="brand-link align-items-center flex justify-center mb-[30px]">
            <img src="{{ asset('assets/images/svg/ICONLOGO.svg') }}" alt="AdminLTE Logo" class="brand-image"
                style="opacity: .8" class="w-[37px] h-[44px]" width="40px">
            <div class="flex flex-col brand-text ml-3 ">
                <span class="font-bold text-[22px]">SIKPTA</span>
                <span class="text-[12.64px] text-[#A8A8A8] -mt-2">INFORMATIKA UNPAS</span>
            </div>
        </a>

        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                required autofocus autocomplete="email" placeholder="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">


            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" placeholder="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <button type="submit" class="bg-[#22B07D] text-white px-6 py-2 rounded-lg w-full mt-6">LOGIN</button>
    </form>
    <div class="flex justify-center text-[#9D9D9D] text-[10px]">
        <span>© SIKPTA INFORMATIKA UNPAS 2024</span>
    </div>
</x-guest-layout>
