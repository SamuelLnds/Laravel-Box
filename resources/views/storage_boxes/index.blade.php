<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    @if (count($boxes) > 0)
                        <table class="mx-auto">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Taille</th>
                                    <th>Coût mensuel</th>
                                    <th>Disponibilité</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boxes as $box)
                                    <tr>
                                        <td><a href="{{ route('storage_boxes.show', $box->id) }}">{{ $box->name }}</a></td>
                                        <td>{{ ucfirst($box->size) }}</td>
                                        <td>{{ $box->monthly_cost  }}€</td>
                                        <td> <input type="checkbox" {{ $box->availability ? 'checked' : '' }} disabled/> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        Vous n'avez pas de storage box !
                    @endif
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <a href="{{ route('storage_boxes.create') }}" class="add-btn">Ajouter une nouvelle storage box</a>
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