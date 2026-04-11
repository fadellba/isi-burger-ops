<x-customer-layout>
    <div class="max-w-3xl mx-auto pt-8">

        <a href="{{ route('customer.orders.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-orange-500 font-bold text-sm mb-6 transition">
            ← Retour à l'historique
        </a>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-600 rounded-2xl font-bold flex items-center gap-3">
                <span>🎉</span> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-400 to-red-500"></div>

            <div class="p-8">
                <div class="flex flex-col md:flex-row justify-between md:items-start gap-4 pb-8 border-b border-dashed border-slate-200">
                    <div>
                        <h1 class="text-2xl font-black text-slate-900 mb-1">Commande N°{{ $order->numero_commande }}</h1>
                        <p class="text-slate-500 text-sm font-medium">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
                    </div>
                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-xl self-start
                        {{ in_array($order->status, ['en_attente', 'en_preparation']) ? 'bg-orange-50 text-orange-600' : '' }}
                        {{ in_array($order->status, ['prete', 'payee']) ? 'bg-emerald-50 text-emerald-600' : '' }}
                        {{ $order->status === 'annulee' ? 'bg-red-50 text-red-600' : '' }}">
                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                    </span>
                </div>

                <div class="py-8 space-y-4">
                    <h3 class="text-sm font-black text-slate-400 uppercase tracking-widest mb-4">Détail des articles</h3>
                    @foreach($order->burgers as $burger)
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-4">
                                <span class="bg-slate-50 text-slate-600 font-bold px-3 py-1 rounded-lg text-sm">{{ $burger->pivot->quantity }}x</span>
                                <span class="font-bold text-slate-800">{{ $burger->nom }}</span>
                            </div>
                            <span class="font-bold text-slate-900">
                                {{ number_format($burger->pivot->unit_price * $burger->pivot->quantity, 0, ',', ' ') }} F
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="bg-slate-50 rounded-2xl p-6 mt-4 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Paiement au comptoir</p>
                        <p class="text-xs text-slate-400">(Espèces ou Wave/Orange Money)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Total payé</p>
                        <p class="text-3xl font-black text-orange-600">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-customer-layout>
