<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Annonce') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight monTest">Modifier une annonce</h1><br>
                    <hr>
                    <br>
                    @if (session()->has('error'))
                        <div class="text-danger">
                            {{ Session('error') }}
                        </div>
                    @endif
                    <p><a href="{{ route('index') }}" class="btn btn-primary">Retour</a></p><br>
                    <form action="{{ route('update', $ad->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')  <!-- Spécifie la méthode PUT pour l'update -->
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="title" value="{{ $ad->title }}"
                                    id="title" >
                            </div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="categorie"
                                    value="{{ $ad->categorie }}" id="categorie">
                            </div>
                            @error('categorie')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="description"
                                    value="{{ $ad->description }}" id="description">
                            </div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="number" name="prix" value="{{ $ad->prix }}"
                                    id="prix" >
                            </div>
                            @error('prix')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input class="form-control" type="text" name="emplacement"
                                    value="{{ $ad->emplacement }}" id="emplacement">
                            </div>
                            @error('emplacement')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="file" name="picture" id="picture">
                                <small>Image actuelle : <img src="{{ asset('storage/'. $ad->picture) }}" class="pictu" width="100"></small>
                            </div>
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="form-control btn btn-primary" name="valider">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
