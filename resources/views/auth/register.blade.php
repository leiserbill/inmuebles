<x-guest-layout>
  <form method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus
        autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
<div>
  <div class="mt-4 relative" x-data="{       
        showPassword : false
      }">

    <x-input-label for="password" :value="__('Password')" />

    <x-text-input 
      id="password" class="block mt-1 w-full"   
      x-bind:type="showPassword ? 'text' : 'password'"
      name="password" 
      required 
      autocomplete="new-password" />

    <div x-on:click="showPassword = !showPassword">

      <div class="absolute inset-y-0 right-0 pr-3 pt-5 flex items-center cursor-pointer"
        :class="showPassword ? 'invisible' : 'visible'">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
      </div>

      <div class="absolute inset-y-0 right-0 pr-3 pt-5 flex items-center cursor-pointer"
        :class="showPassword ? 'visible' : 'invisible'">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
      </div>

    </div>

  </div>
  
  <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

    <!-- Confirm Password -->
    <div>

      <div class="mt-4 relative" x-data="{
                          showPassword : false
                      }">
  
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
  
        <x-text-input id="password_confirmation" class="block mt-1 w-full"
          x-bind:type="showPassword ? 'text' : 'password'" name="password_confirmation" required
          autocomplete="new-password" />
  
        <div x-on:click="showPassword = !showPassword">
  
          <div class="absolute inset-y-0 right-0 pr-3 pt-5 flex items-center cursor-pointer"
            :class="showPassword ? 'invisible' : 'visible'">
  
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
          </div>
  
          <div class="absolute inset-y-0 right-0 pr-3 pt-5 flex items-center cursor-pointer"
            :class="showPassword ? 'visible' : 'invisible'">
  
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
          </div>
  
  
  
  
        </div>
  
      </div>
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="inline-flex items-center mt-2">
      <label class="flex items-center cursor-pointer relative" for="terminos">
        <input type="checkbox"
          class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
          id="terminos" 
          name= "acepta_terminos"
          value= 1
          :value="old('acepta_terminos')" 
          required
          />
        <span
          class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
            stroke="currentColor" stroke-width="1">
            <path fill-rule="evenodd"
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
              clip-rule="evenodd"></path>
          </svg>
        </span>
      </label>

      <label class="cursor-pointer ml-2 text-slate-600 text-sm"  for="terminos">
        <p >

          Acepto <x-link target="_blank" rel="noopener noreferrer" class="text-indigo-800" :href="route('terminos')">
            Terminos y condiciones </x-link> .
          .
        </p>
      </label>
      <x-input-error :messages="$errors->get('acepta_terminos')" class="mt-2" />
    </div>

    <div class="inline-flex items-center mt-2">
      <label class="flex items-center cursor-pointer relative" for="check-with-link">
        <input type="checkbox"
          class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
          id="check-with-link" 
          value= 1
          name= "acepta_correos"
          :value="old('acepta_correos')" 
          required
          />
        <span
          class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
            stroke="currentColor" stroke-width="1">
            <path fill-rule="evenodd"
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
              clip-rule="evenodd"></path>
          </svg>
        </span>
      </label>
      <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-with-link">
        <p>

          Acepto el envio de correos electronicos
          .
        </p>
      </label>
      <x-input-error :messages="$errors->get('acepta_correos')" class="mt-2" />
    </div>

    <div class="flex justify-between py-5">
      <x-link :href="route('login')">
        Iniciar Sesión
      </x-link>

      <x-link :href="route('password.request')">
        Olvidaste tu Password
      </x-link>

    </div>
    <x-primary-button class="w-full justify-center">
      {{ __('Registrarse') }}
    </x-primary-button>
  </form>
</x-guest-layout>