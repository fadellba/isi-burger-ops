<?php

namespace Database\Seeders;

use App\Models\Burger;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = User::role('customer')->first();
        $burgers = Burger::all();

        if ($customer && $burgers->count() > 0) {
            $statuses = ['en_attente', 'en_preparation', 'prete'];

            foreach ($statuses as $status) {
                $total = $burgers->random(2)->sum('unit_price');
                $order = Order::create([
                    'user_id' => $customer->id,
                    'status' => $status,
                    'total_amount' => $total,
                    'numero_commande' => 'CMD-' . date('Ymd') . '-' . strtoupper(uniqid()),
                ]);

                $order->burgers()->attach(
                    $burgers->random(2)->pluck('id')->toArray(),
                    ['quantity' => rand(1, 3), 'unit_price' => 10.00]
                );
            }
        }
    }
}
