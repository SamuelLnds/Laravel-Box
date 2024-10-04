<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <form id="createForm" action="{{ route('storage_boxes.store') }}" method="POST">
                        @csrf

                        <!-- Name Field -->
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" placeholder="Box Avec Un Nom" value="{{ old('name') }}"/>
                        @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>
                        @endif

                        <!-- Size Field -->
                        <label for="size">Taille</label>
                        <select name="size" id="size">
                            <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small</option>
                            <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large</option>
                        </select>
                        @if ($errors->has('size'))
                            <span class="text-red-500">{{ $errors->first('size') }}</span>
                        @endif

                        <!-- Monthly Cost Field -->
                        <label for="monthly_cost">Coût mensuel (en €)</label>
                        <input type="number" name="monthly_cost" id="monthly_cost" placeholder="100.00" value="{{ old('monthly_cost') }}"/>
                        @if ($errors->has('monthly_cost'))
                            <span class="text-red-500">{{ $errors->first('monthly_cost') }}</span>
                        @endif

                        <!-- Tenant Select Field -->
                        <label for="tenant_id">Locataire (Optionnel)</label>
                        <select name="tenant_id" id="tenant_id">
                            <option value="">Aucun locataire</option>
                            @foreach ($tenants as $tenant)
                                <option value="{{ $tenant->id }}" {{ old('tenant_id') == $tenant->id ? 'selected' : '' }}>
                                    {{ $tenant->first_name }} {{ $tenant->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('tenant_id'))
                            <span class="text-red-500">{{ $errors->first('tenant_id') }}</span>
                        @endif

                        <button type="submit">Enregistrer les modifications</button>
                    </form>
                    
                    <br/><hr/><br/>
                    <a href="{{ route('storage_boxes.index') }}">Revenir à vos storage boxes</a>
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

    input[type=text], input[type=number], select {
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
