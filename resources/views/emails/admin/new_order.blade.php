<p>Bonjour {{ $admin->name }},</p>
<p>Une nouvelle commande vient d'être passée sur Isi Burger.</p>
<ul>
    <li><strong>Client :</strong> {{ $order->user->name }}</li>
    <li><strong>Montant :</strong> {{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</li>
</ul>
<p><a href="{{ url('/manager/orders/' . $order->id) }}">Voir la commande sur le Dashboard</a></p>
