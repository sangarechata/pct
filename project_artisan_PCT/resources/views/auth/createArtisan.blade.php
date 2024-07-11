<x-guest-layout>
    <form method="POST" action="{{ route('inscriptionArtisan') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="lastName" :value="__('Prenom')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>
        <!-- Email Address -->      
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="numberPhone" :value="__('Numero de telephone')" />
            <x-text-input id="numberPhone" class="block mt-1 w-full" type="number" name="numberPhone" :value="old('numberPhone')" autocomplete="off" placeholder="225 0700000000" />
            <x-input-error :messages="$errors->get('numberPhone')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="nameEntrep" :value="__('Nom entreprise')" />
            <x-text-input id="nameEntrep" class="block mt-1 w-full" type="text" name="nameEntrep" :value="old('nameEntrep')" />
            <x-input-error :messages="$errors->get('nameEntrep')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="nameArt" :value="__('Type artisanat')" />
            <x-text-input id="nameArt" class="block mt-1 w-full" type="text" name="nameArt" :value="old('nameArt')" />
            <x-input-error :messages="$errors->get('nameArt')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="nameExp" :value="__('Années expérience')" />
            <x-text-input id="nameExp" class="block mt-1 w-full" type="number" name="nameExp" :value="old('nameExp')" />
            <x-input-error :messages="$errors->get('nameExp')" class="mt-2" />
        </div>
        <!-- <div>
            <input style="display: none;" type="text" name="role" value="artisan"/>
        </div> -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>