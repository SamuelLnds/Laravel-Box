<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <form id="createForm" action="{{ route('tenants.store') }}" method="POST">
                        @csrf

                        <label for="first_name">Prénom</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Didier" value="{{ old('first_name') }}"/>
                        @if ($errors->has('first_name'))
                            <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                        @endif


                        <button type="submit">Enregistrer les modifications</button>
                    </form>
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
