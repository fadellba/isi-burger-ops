<x-customer-layout>
    <div class="mb-12 text-center pt-8">
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-4">Notre <span class="text-orange-500">Catalogue</span> 🤤</h1>
        <p class="text-slate-500 font-medium">Découvrez nos créations classées par catégories.</p>
    </div>

    <div class="space-y-12">
        @foreach($categories as $category)
            @if($category->burgers->count() > 0)
                <section>
                    <div class="flex items-center gap-4 mb-6">
                        <h2 class="text-2xl font-black text-slate-800 uppercase tracking-wide">{{ $category->nom }}</h2>
                        <div class="h-px bg-slate-100 flex-1"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($category->burgers as $burger)
                            <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                                <div class="aspect-square bg-slate-50 rounded-2xl mb-4 overflow-hidden relative flex items-center justify-center">
                                    @if($burger->image)
                                        <img src="{{ asset('storage/' . $burger->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $burger->nom }}">
                                    @else
                                        <span class="text-6xl group-hover:scale-110 transition duration-500">🍔</span>
                                    @endif

                                    @if($burger->stock < 5)
                                        <span class="absolute top-3 right-3 bg-red-500 text-white text-[10px] font-black px-2 py-1 rounded-full animate-pulse">
                                            Plus que {{ $burger->stock }} !
                                        </span>
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-slate-900">{{ $burger->nom }}</h3>
                                    <p class="text-sm text-slate-400 line-clamp-2 mt-1">{{ $burger->description ?? 'Un délice préparé avec soin.' }}</p>
                                </div>

                                <div class="mt-4 flex items-center justify-between">
                                    <p class="text-orange-600 font-black text-xl">{{ number_format($burger->unit_price, 0, ',', ' ') }} <span class="text-sm">F</span></p>

                                    <form action="{{ route('customer.cards.add', $burger) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-slate-900 text-white w-10 h-10 rounded-xl font-bold hover:bg-orange-500 transition shadow-lg flex items-center justify-center">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        @endforeach
    </div>
</x-customer-layout>
