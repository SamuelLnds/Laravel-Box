<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <form action="{{ route('storage_boxes.update', $box->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" value="{{ $box->name }}"/>
                        <label for="size">Taille</label>
                        <select name="size" id="size">
                            <option value="small" {{ $box->size == "small" ? 'selected' : '' }}>Small</option>
                            <option value="medium" {{ $box->size == "medium" ? 'selected' : '' }}>Medium</option>
                            <option value="large" {{ $box->size == "large" ? 'selected' : '' }}>Large</option>
                        </select>
                        <label for="monthly_cost">Coût mensuel (en €)</label>
                        <input type="text" name="monthly_cost" id="monthly_cost" value="{{ $box->monthly_cost }}"/>
                        <span class="form-inline mt-6">
                            <label for="availability">Disponible ?</label>
                            <input name="availability" id="availability" type="checkbox" {{ $box->availability ? 'checked' : '' }}/> 
                        </span>
                        
                        {{-- TODO : ADD TENANTS --}}
                        <button type="submit">Enregistrer les modifications</button>
                    </form>
                    <form action="{{ route('storage_boxes.destroy', $box->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
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

    input[type=text], select {
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