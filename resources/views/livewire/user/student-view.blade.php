<div class="">
    <hr>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ETUDIANT ENREGISTREMENT') }}
            </h2>
        </div>
    </header>

    <div class="min-h-screen flex flex-col sm:justify-center items-center  sm:pt-0 bg-gray-100">


        <div class="w-full sm:max-w-md mt-6 px-6 py-4  shadow-md overflow-hidden bg-gray-50 sm:rounded-lg">
            <div class="w-full p-3.5 rounded {{($checked=true)? '':'hidden'}} mb-6">
                <h2 class="text-green-500 text-lg">Votre compte est deja associe a un compte etudiant</h2>
            </div>
            <form wire:submit.prevent="register">


                <div>
                    <x-jet-label for="name" value="{{ __('Name Complet') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="etudiant.name"
                        required autofocus autocomplete="name" />
                    @error('etudiant.name')
                    <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">{{$message}}</span>
                        @enderror
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Matricule') }}" />
                    <x-jet-input id="text" class="block mt-1 w-full" type="text" wire:model.defer="etudiant.matricule"
                        required />
                    @error('etudiant.matricule')
                    <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">{{$message}}</span>
                        @enderror
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Faculte') }}" />
                    <select wire:model.defer="etudiant.faculte"
                        class="g-gray-50 border border-gray-300 text-gray-900 text-md sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        name="" id="">
                        <option selected>-- categorie---</option>
                        <option value="">categorie</option>
                        @foreach ($facultes as $item)
                        <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                    @error('etudiant.faculte')
                    <p class="mt-2 text-md sm:text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">{{$message}}</span>
                        @enderror

                </div>





                <div class="flex items-center justify-end mt-4">


                    <x-jet-button class="ml-4 {{($checked=true)? 'hidden':''}}">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>


    {{-- The Master doesn't talk, he acts. --}}
</div>
@push('script')
<script>
    window.addEventListener('showSuccessMessage', event=> {
    
    Swal.fire({
    position: 'top-end',
    icon:'success',
    toast: true,
    title:"operatione reussie",
    text:event.detail.message,
    showConfirmButton: false,
    timer:6000
    
    });
    
    });
</script>

@endpush