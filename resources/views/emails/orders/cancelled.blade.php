<h1>Bonjour {{ $order->user->name }},</h1>
<p>Nous vous informons que votre commande <strong>{{ $order->numero_commande }}</strong> a été annulée.</p>

<p>Si vous aviez déjà effectué un paiement, notre équipe procédera au remboursement dans les plus brefs délais.</p>

<p>Vous pouvez repasser commande à tout moment sur notre catalogue :
    <a href="{{ url('/') }}">Isi Burger</a>
</p>

<p>À bientôt !<br>L'équipe Isi Burger</p>
