<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::where('status', 'prete')->get();

        foreach ($orders as $order) {
            if (rand(0, 1)) {
                Payment::create([
                    'order_id'     => $order->id,
                    'amount'       => $order->total_amount,
                    'payment_date' => $order->created_at->addMinutes(rand(5, 30)),
                ]);
            }
        }
    }
}
