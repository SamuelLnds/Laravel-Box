<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <form id="updateForm" action="{{ route('storage_boxes.update', $box->id) }}" method="POST">
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

                    <form id="deleteForm" action="{{ route('storage_boxes.destroy', $box->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="deleteButton" type="submit">Supprimer</button>
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

<script>

    document.addEventListener('DOMContentLoaded', function() {

        let isFormSubmitting = false;

        document.getElementById('deleteButton').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir supprimer cette boîte de stockage ? Cette action est irréversible.')) {
                isFormSubmitting = true;
                document.getElementById('deleteForm').submit();
            }
        });

        let initialData = {
            name: document.getElementById('name').value,
            size: document.getElementById('size').value,
            monthly_cost: document.getElementById('monthly_cost').value,
            availability: document.getElementById('availability').checked
        };

        let isFormModified = false;

        document.getElementById('updateForm').addEventListener('change', function(event) {
            isFormModified = checkFormChanges();
        });

        document.getElementById('updateForm').addEventListener('submit', function(event) {
            isFormSubmitting = true;
        });

        function checkFormChanges() {
            return (
                initialData.name !== document.getElementById('name').value ||
                initialData.size !== document.getElementById('size').value ||
                initialData.monthly_cost !== document.getElementById('monthly_cost').value ||
                initialData.availability !== document.getElementById('availability').checked
            );
        }

        window.addEventListener('beforeunload', function(event) {
            if (isFormModified && !isFormSubmitting) {
                const message = 'Vous avez des modifications non enregistrées. Êtes-vous sûr de vouloir quitter cette page ?';
                event.returnValue = message;
                return message;
            }
        });

    });
    
</script>