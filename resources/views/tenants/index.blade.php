<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    @if (count($tenants) > 0)
                        <table class="mx-auto">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>Mail</th>
                                    <th>Adresse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                    <tr>
                                        <td><a href="{{ route('tenants.show', $tenant->id) }}">{{ $tenant->first_name }} {{ $tenant->last_name }}</a></td>
                                        <td>{{ $tenant->phone_number }}</td>
                                        <td>{{ $tenant->email }}</td>
                                        <td>{{ $tenant->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Vous n'avez pas encore eu de locataire !
                    @endif
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <a href="{{ route('tenants.create') }}" class="add-btn">Ajouter un nouveau locataire</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>

    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid white;
    }


    th, td {
        padding: .25rem .5rem;
    }

    .add-btn {
        padding: .5rem 1rem;
        border: solid 1px white;
        margin-inline: auto;

        &:hover {
            border: solid 2px white;
        }
    }

</style>