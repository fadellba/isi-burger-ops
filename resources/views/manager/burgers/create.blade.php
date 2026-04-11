<x-manager-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('manager.burgers.index') }}" class="text-slate-400 hover:text-indigo-600 transition bg-white p-2 rounded-lg border border-slate-200 shadow-sm">
                ←
            </a>
            <h2 class="font-bold text-xl text-slate-800">Ajouter un nouveau Burger</h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('manager.burgers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nom du burger</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex: Le Royal Cheese"
                               class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 @error('nom') border-red-500 @enderror">
                        @error('nom') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Prix (en FCFA)</label>
                            <div class="relative">
                                <input type="number" name="unit_price" step="1" value="{{ old('unit_price') }}"
                                       class="w-full border-slate-200 rounded-xl pl-4 pr-12 focus:ring-indigo-500 focus:border-indigo-500 @error('unit_price') border-red-500 @enderror">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-bold">FCFA</span>
                            </div>
                            @error('unit_price') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Stock initial</label>
                            <input type="number" name="stock" value="{{ old('stock') }}"
                                   class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 @error('stock') border-red-500 @enderror">
                            @error('stock') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Catégorie</label>
                        <select name="category_id" class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 @error('category_id') border-red-500 @enderror">
                            <option value="">-- Sélectionner une catégorie --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="p-6 border-2 border-dashed border-slate-200 rounded-2xl hover:border-indigo-400 transition group">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Image du burger</label>
                        <input type="file" name="image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition" accept="image/*">
                        @error('image') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Description / Ingrédients</label>
                        <textarea name="description" rows="3" placeholder="Décrivez les ingrédients..."
                                  class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('manager.burgers.index') }}" class="text-slate-400 hover:text-slate-600 font-bold transition">Annuler</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-indigo-200 transition">
                            Créer le burger
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-manager-layout>
