<div>
   
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

            <div>
                            <input type="checkbox" name="condiciones" id="condiciones">

                
                            <x-primary-button class="w-full justify-center">
                                {{ __('ENVIAR MENSAJE') }}
                            </x-primary-button>
            </div>
        </div>
    </form>
</div>
