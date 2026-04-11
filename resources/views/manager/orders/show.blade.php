<x-manager-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('manager.orders.index') }}" class="text-slate-400 hover:text-indigo-600 transition bg-white p-2 rounded-lg border border-slate-200 shadow-sm">
                ←
            </a>
            <span>Détails de la Commande <span class="text-indigo-600 font-mono">#{{ $order->numero_commande }}</span></span>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-start gap-4">
                <div class="bg-indigo-50 p-3 rounded-xl text-indigo-600 text-2xl">
                    👤
                </div>
                <div>
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Informations Client</h3>
                    <p class="font-bold text-slate-800 text-lg">{{ $order->user->name }}</p>
                    <p class="text-slate-500 text-sm">{{ $order->user->email }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-start gap-4">
                <div class="bg-slate-50 p-3 rounded-xl text-slate-600 text-2xl">
                    🧾
                </div>
                <div class="w-full">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Détails de facturation</h3>
                    <p class="text-slate-800 font-medium">Date : <span class="font-normal text-slate-600">{{ $order->created_at->format('d/m/Y à H:i') }}</span></p>

                    <div class="mt-3 flex items-center gap-2">
                        <span class="text-slate-800 font-medium text-sm">Statut :</span>
                        @php
                            $badgeColors = [
                                'en_attente'     => 'bg-amber-100 text-amber-800 border-amber-200',
                                'en_preparation' => 'bg-orange-100 text-orange-800 border-orange-200',
                                'prete'          => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                'payee'          => 'bg-indigo-100 text-indigo-800 border-indigo-200',
                                'annulee'        => 'bg-rose-100 text-rose-800 border-rose-200',
                            ];
                            $colorClass = $badgeColors[$order->status] ?? 'bg-slate-100 text-slate-800 border-slate-200';
                            $statusText = ucfirst(str_replace('_', ' ', $order->status));
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $colorClass }}">
                            {{ $statusText }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-slate-800">Contenu du panier</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-white text-slate-400 text-xs uppercase tracking-wider font-bold border-b border-slate-100">
                        <th class="p-4 pl-6">Produit</th>
                        <th class="p-4 text-center">Quantité</th>
                        <th class="p-4 text-right">Prix Unitaire</th>
                        <th class="p-4 pr-6 text-right">Total Ligne</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                    @foreach($order->burgers as $burger)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="p-4 pl-6 font-medium text-slate-800">
                                🍔 {{ $burger->nom }}
                            </td>
                            <td class="p-4 text-center">
                                    <span class="bg-slate-100 text-slate-700 font-bold px-3 py-1 rounded-lg">
                                        x{{ $burger->pivot->quantity }}
                                    </span>
                            </td>
                            <td class="p-4 text-right text-slate-500">
                                {{ number_format($burger->pivot->unit_price, 0, ',', ' ') }} F
                            </td>
                            <td class="p-4 pr-6 text-right font-bold text-slate-700">
                                {{ number_format($burger->pivot->unit_price * $burger->pivot->quantity, 0, ',', ' ') }} F
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-slate-50 p-6 border-t border-slate-200 flex flex-col items-end">
                <div class="w-full max-w-sm space-y-3">
                    <div class="flex justify-between text-slate-500">
                        <span>Sous-total</span>
                        <span>{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</span>
                    </div>
                    <div class="flex justify-between text-slate-500">
                        <span>TVA & Frais</span>
                        <span>Inclus</span>
                    </div>
                    <div class="pt-4 border-t border-slate-200 flex justify-between items-center">
                        <span class="font-bold text-slate-800 uppercase">Total à payer</span>
                        <span class="text-2xl font-black text-indigo-600">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-manager-layout>
