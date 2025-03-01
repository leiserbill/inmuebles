<div>
    <h3 class="text-2xl text-center  font-extrabold text-gray-900"> Contactar al Vendedor</h3>
    <form wire:submit.prevent = "enviarMensaje" class="text-gray-600 font-bold text-xs justify-center">
        <div class="p-5 space-y-5">
            <label for="mensaje">Mensaje</label>

            <textarea id="mensaje" wire:model="mensaje"
                class="w-full px-2 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 p-5"
                placeholder="Coloca tu mensaje aquí">
            </textarea>

            @error('mensaje')
            <livewire:mostrar-alerta :message='$message' />
            @enderror

            {{-- <x-text-input id="inmuebleId" type="hidden" wire:model="inmuebleId" /> --}}

            <x-primary-button class="w-full justify-center">
                {{ __('ENVIAR MENSAJE') }}
            </x-primary-button>
        </div>
    </form>
</div>
