<x-manager-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('manager.burgers.index') }}" class="text-slate-400 hover:text-indigo-600 transition bg-white p-2 rounded-lg border border-slate-200 shadow-sm">
                ←
            </a>
            <h2 class="font-bold text-xl text-slate-800">Modifier : <span class="text-indigo-600">{{ $burger->nom }}</span></h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('manager.burgers.update', $burger) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="w-full md:w-1/3">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Visuel actuel</label>
                            <div class="relative group">
                                @if($burger->image)
                                    <img src="{{ asset('storage/' . $burger->image) }}" class="w-full aspect-square object-cover rounded-2xl border-4 border-white shadow-md">
                                @else
                                    <div class="w-full aspect-square bg-slate-100 rounded-2xl flex items-center justify-center text-4xl border-2 border-dashed border-slate-200">🍔</div>
                                @endif
                                <div class="mt-4">
                                    <input type="file" name="image" class="hidden" id="imageInput" accept="image/*">
                                    <label for="imageInput" class="cursor-pointer block text-center py-2 px-4 bg-slate-100 hover:bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold transition border border-slate-200">
                                        Changer l'image
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 w-full space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nom du burger</label>
                                <input type="text" name="nom" value="{{ old('nom', $burger->nom) }}"
                                       class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Prix (FCFA)</label>
                                    <input type="number" name="unit_price" value="{{ old('unit_price', $burger->unit_price) }}"
                                           class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Stock</label>
                                    <input type="number" name="stock" value="{{ old('stock', $burger->stock) }}"
                                           class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Catégorie</label>
                                <select name="category_id" class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $burger->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100">
                        <a href="{{ route('manager.burgers.index') }}" class="text-slate-400 hover:text-slate-600 font-bold transition">Annuler les modifs</a>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-emerald-200 transition">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-manager-layout>
