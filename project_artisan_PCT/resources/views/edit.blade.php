<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une annonce') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight monTest">Ajouter une annonce</h1><br>
                    <hr>
                    <br>
                    <p><a href="{{ route('index') }}" class="btn btn-primary">Retour</a></p><br>
                    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Le titre de l'annonce">
                            </div>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="categorie" value="{{ old('categorie') }}" id="categorie" placeholder="Categorie de l'annonce">
                            </div>
                            @error("categorie")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="description" value="{{ old('description') }}" id="description" placeholder="Description de l'annonce">
                            </div>
                            @error("description")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="number" name="prix" value="" id="prix" placeholder="Prix de l'annonce">
                            </div>
                            @error("prix")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="emplacement" value="{{ old('emplacement') }}" id="emplacement" placeholder="Emplacement de l'annonce">
                            </div>
                            @error("emplacement")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="file" name="picture" id="picture">
                            </div>
                            @error("picture")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="d-gird">
                                <button class="form-control btn btn-primary" name="valider">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>