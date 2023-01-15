<div>
    @empty(!$state)
    <x-jet-form-section submit="updateStudent">
        <x-slot name="title">
            {{ __('Profile Student') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Can Update Your full Name or Facultes But don-t Magtricule.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                    autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Matricule') }}" />
                <x-jet-input id="name" disabled type="text" class="mt-1 block w-full" wire:model.defer="state.matricule"
                    autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Faculte') }}" />
                <x-jet-input id="name" disabled type="text" class="mt-1 block w-full" wire:model.defer="state.faculte"
                    autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
    @endempty

</div>