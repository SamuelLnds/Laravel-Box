<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">

                    <form id="updateForm" action="{{ route('tenants.update', $tenant->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <label for="first_name">Prénom</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $tenant->first_name) }}"/>
                        @if ($errors->has('first_name'))
                            <span>{{ $errors->first('first_name') }}</span>
                        @endif

                        <label for="last_name">Nom</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $tenant->last_name) }}"/>
                        @if ($errors->has('last_name'))
                            <span>{{ $errors->first('last_name') }}</span>
                        @endif

                        <label for="email">Mail</label>
                        <input type="text" name="email" id="email" value="{{ old('email', $tenant->email) }}"/>
                        @if ($errors->has('email'))
                            <span>{{ $errors->first('email') }}</span>
                        @endif

                        <label for="phone_number">Numéro de téléphone</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $tenant->phone_number) }}"/>
                        @if ($errors->has('phone_number'))
                            <span>{{ $errors->first('phone_number') }}</span>
                        @endif

                        <label for="address">Adresse</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $tenant->address) }}"/>
                        @if ($errors->has('address'))
                            <span>{{ $errors->first('address') }}</span>
                        @endif

                        <br/>
                        <button type="submit">Enregistrer les modifications</button>
                    </form>
                    

                    <form id="deleteForm" action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="deleteButton" type="submit">Supprimer</button>
                    </form>

                    <br/><hr/><br/>
                    <a href="{{ route('tenants.index') }}">Revenir à vos locataires</a>

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
            first_name: document.getElementById('first_name').value,
            last_name: document.getElementById('last_name').value,
            email: document.getElementById('email').value,
            phone_number: document.getElementById('phone_number').value,
            address: document.getElementById('address').value
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
                initialData.first_name !== document.getElementById('first_name').value ||
                initialData.last_name !== document.getElementById('last_name').value ||
                initialData.email !== document.getElementById('email').value ||
                initialData.phone_number !== document.getElementById('phone_number').value ||
                initialData.address !== document.getElementById('address').value
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