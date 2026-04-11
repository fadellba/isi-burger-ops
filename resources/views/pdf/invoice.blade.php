<h2>Merci pour votre gourmandise, {{ $order->user->name }}</h2>
<p>Votre commande {{ $order->numero_commande }} a été enregistrée avec succès.</p>

<table>
    <thead>
    <tr>
        <th>Produit</th>
        <th>Qté</th>
        <th>Prix</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->burgers as $burger)
        <tr>
            <td>{{ $burger->nom }}</td>
            <td>x{{ $burger->pivot->quantity }}</td>
            <td>{{ number_format($burger->pivot->unit_price * $burger->pivot->quantity, 0, ',', ' ') }} FCFA</td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Total : {{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</p>

<p>Nous vous préviendrons dès qu'elle sera en préparation !</p>
<hr>
<p>L'équipe Isi Burger.</p>
