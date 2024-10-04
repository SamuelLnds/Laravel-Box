<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <form id="createForm" action="{{ route('tenants.store') }}" method="POST">
                        @csrf
                    
                        <label for="first_name">Prénom</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Entrez le prénom" value="{{ old('first_name') }}"/>
                        @if ($errors->has('first_name'))
                            <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                        @endif
                    
                        <label for="last_name">Nom</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Entrez le nom" value="{{ old('last_name') }}"/>
                        @if ($errors->has('last_name'))
                            <span class="text-red-500">{{ $errors->first('last_name') }}</span>
                        @endif
                    
                        <label for="email">Mail</label>
                        <input type="email" name="email" id="email" placeholder="exemple@domaine.com" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                            <span class="text-red-500">{{ $errors->first('email') }}</span>
                        @endif
                    
                        <label for="phone_number">Numéro de téléphone</label>
                        <input type="text" name="phone_number" id="phone_number" placeholder="06 00 00 00 00" value="{{ old('phone_number') }}"/>
                        @if ($errors->has('phone_number'))
                            <span class="text-red-500">{{ $errors->first('phone_number') }}</span>
                        @endif
                    
                        <label for="address">Adresse</label>
                        <input type="text" name="address" id="address" placeholder="Entrez l'adresse" value="{{ old('address') }}"/>
                        @if ($errors->has('address'))
                            <span class="text-red-500">{{ $errors->first('address') }}</span>
                        @endif
                    
                        <br/>
                        <button type="submit">Créer le locataire</button>
                    </form>
                    
                    <br/><hr/><br/>
                    <a href="{{ route('storage_boxes.index') }}">Revenir à vos locataires</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<style>

    form {
        display: flex;
        flex-direction: column;
        margin-inline: auto;
        width: 500px;
        text-align: start;
    }

    .form-inline {
        margin-block: 1rem .5rem;
        display: flex;
        gap: 1rem;
        align-items: center;

        & > label {
            margin: 0;
        }
    }

    label {
        margin-block: 1rem .5rem;
    }

    a:not(nav a) {
        text-decoration: underline;
    }

    input[type=text], input[type=number], input[type=email], select {
        background-color: transparent;
    }

    select > option {
        background-color: #1F2937;
    }

    form button {
        padding: .5rem 1rem;
        border: solid 1px white;
        margin-inline: auto;
        margin-block: 1rem;

        &:hover {
            border: solid 2px white;
        }
    }
    
</style>
