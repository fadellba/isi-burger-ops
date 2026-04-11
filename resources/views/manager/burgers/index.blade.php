<x-manager-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-bold text-xl text-slate-800">Gestion des Burgers</h2>
            <a href="{{ route('manager.burgers.create') }}"
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-xl transition shadow-lg shadow-indigo-200">
                <span>➕</span> Nouveau Burger
            </a>
        </div>
    </x-slot>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider font-bold border-b border-slate-200">
                    <th class="p-4 pl-6">Produit</th>
                    <th class="p-4">Prix Unitaire</th>
                    <th class="p-4">État du Stock</th>
                    <th class="p-4 text-right pr-6">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @foreach($burgers as $burger)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="p-4 pl-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center text-xl">
                                    <img src="{{ asset('storage/' . $burger->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $burger->nom }}">
                                </div>
                                <span class="font-bold text-slate-800">{{ $burger->nom }}</span>
                            </div>
                        </td>

                        <td class="p-4 font-semibold text-slate-600">
                            {{ number_format($burger->unit_price, 0, ',', ' ') }} <span class="text-xs font-normal text-slate-400">FCFA</span>
                        </td>

                        <td class="p-4">
                            @php
                                $stockColor = 'text-emerald-600 bg-emerald-50 border-emerald-100';
                                $label = 'En stock';

                                if($burger->stock <= 0) {
                                    $stockColor = 'text-rose-600 bg-rose-50 border-rose-100';
                                    $label = 'Rupture';
                                } elseif($burger->stock <= 10) {
                                    $stockColor = 'text-amber-600 bg-amber-50 border-amber-100';
                                    $label = 'Stock bas';
                                }
                            @endphp
                            <div class="flex items-center gap-3">
                                <span class="font-black text-slate-800 text-lg w-8">{{ $burger->stock }}</span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] uppercase font-bold border {{ $stockColor }}">
                                        {{ $label }}
                                    </span>
                            </div>
                        </td>

                        <td class="p-4 text-right pr-6">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('manager.burgers.edit', $burger) }}"
                                   class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition"
                                   title="Modifier">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <a href="#archive-{{ $burger->id }}"
                                   class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition"
                                   title="Archiver">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>

                            <div id="archive-{{ $burger->id }}" class="fixed inset-0 z-50 invisible target:visible flex items-center justify-center bg-slate-900/60 backdrop-blur-sm transition-all">
                                <div class="bg-white p-8 rounded-3xl shadow-2xl max-w-sm w-full mx-4 transform transition-all">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">🗑️</div>
                                        <h3 class="text-xl font-bold text-slate-800 mb-2">Archiver ce produit ?</h3>
                                        <p class="text-slate-500 mb-6 text-sm">
                                            Le burger <strong>{{ $burger->nom }}</strong> ne sera plus visible par les clients.
                                        </p>
                                    </div>

                                    <div class="flex gap-3">
                                        <a href="#" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-center hover:bg-slate-200 transition">Annuler</a>

                                        <form action="{{ route('manager.burgers.destroy', $burger) }}" method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full px-4 py-3 bg-rose-600 text-white rounded-xl font-bold hover:bg-rose-700 transition shadow-lg shadow-rose-200">
                                                Archiver
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-manager-layout>
