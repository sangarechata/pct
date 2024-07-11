<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Annonce') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Toutes les annonces') }}
                        </h1>
                        <a href="{{ route('create') }}" class="btn btn-primary">Créer une annonce</a>
                    </div>
                    <br>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Prix</th>
                                <th>Emplacement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                                <tr>
                                    <td class="align-middle">{{ $ad->id }}</td>
                                    <td class="align-middle">{{ $ad->title }}</td>
                                    <td class="align-middle">{{ $ad->categorie }}</td>
                                    <td class="align-middle">{{ $ad->description }}</td>
                                    <td class="align-middle"><img src="{{ asset('storage/'. $ad->picture) }}" class="pictu" width="45"></td>
                                    <td class="align-middle">{{ $ad->prix }} FCFA</td>
                                    <td class="align-middle">{{ $ad->emplacement }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('edit', $ad->id) }}" type="button" class="btn btn-secondary">Modifier</a>
                                            <form method="POST" action="{{ route('delete', $ad->id) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if($ads->isEmpty())
                        <p class="text-center">Aucune annonce trouvée.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
