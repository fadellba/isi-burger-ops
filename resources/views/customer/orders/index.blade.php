<x-customer-layout>
    <div class="max-w-4xl mx-auto pt-8">
        <div class="flex justify-between items-end mb-8">
            <h1 class="text-3xl font-black text-slate-900">Mes Commandes 📜</h1>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                    <div class="block bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition">
                        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">

                            <a href="{{ route('customer.orders.show', $order) }}" class="flex-1 group">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-xs font-black uppercase tracking-widest text-orange-500">N° {{ $order->numero_commande }}</span>
                                    <span class="text-xs text-slate-400 font-medium">{{ $order->created_at->format('d M Y • H:i') }}</span>
                                </div>
                                <p class="text-slate-900 font-bold group-hover:text-orange-600 transition">
                                    {{ $order->burgers->count() }} article(s) commandé(s)
                                </p>
                            </a>

                            <div class="flex items-center gap-6 justify-between md:justify-end">

                                @if(in_array($order->status, ['prete', 'payee']))
                                    <a href="{{ route('customer.orders.download-invoice', $order) }}"
                                       class="flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-orange-600 transition-colors group/btn"
                                       title="Télécharger ma facture">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 group-hover/btn:text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                        </svg>
                                        <span class="hidden sm:inline">Facture PDF</span>
                                    </a>
                                @endif

                                <p class="font-black text-lg text-slate-900">{{ number_format($order->total_amount, 0, ',', ' ') }} F</p>

                                <span class="px-4 py-2 inline-flex text-xs font-bold rounded-xl
                                    {{ in_array($order->status, ['en_attente', 'en_preparation']) ? 'bg-orange-50 text-orange-600 border border-orange-100' : '' }}
                                    {{ in_array($order->status, ['prete', 'payee']) ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : '' }}
                                    {{ $order->status === 'annulee' ? 'bg-red-50 text-red-600 border border-red-100' : '' }}">
                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        @else
        @endif
    </div>
</x-customer-layout>
