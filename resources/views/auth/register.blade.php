<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" data-parsley-validate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" minlength="6"	 required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

{{-- 
     'gender',
        'birthDate',
        'adress',
        'phone',
    --}}

{{-- <div class="mt-4">
<x-input-label for="gender" :value="__('Gender')" />
<select class="block mt-1 w-full"  name="gender" :value="old('gender')">
<option value="male">Male</option>    
<option value="female">Female</option>    
</select>   
    <x-input-error :messages="$errors->get('gender')" class="mt-2" />



</div>

        <!-- BirthDate -->
        <div class="mt-4">
            <x-input-label for="birthDate" :value="__('BirthDate')" />
            <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')" required autofocus />
            <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />

        </div>

        <!-- Adress -->

        <div class="mt-4">
            <x-input-label for="adress" :value="__('Adress')" />
            <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autofocus />
            <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>

        <!-- Phone -->

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

         --}}

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" data-parsley-type="email"	 class="block mt-1 w-full" type="email" name="email" :value="old('email')" required data-parsley-type="email"	 />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" minlength="6"	 />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required minlength="6"	 />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
