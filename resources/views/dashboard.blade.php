<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('storage_boxes.index') }}">Accéder à toutes vos storage boxes</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    a:not(nav a) {
        text-decoration: underline;
    }
    
</style>