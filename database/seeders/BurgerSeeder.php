<?php

namespace Database\Seeders;

use App\Models\Burger;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BurgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $categories = Category::all()->pluck('id', 'nom');
//
//        if ($categories->isEmpty()) {
//            $this->command->error("Veuillez d'abord remplir la table categories !");
//            return;
//        }
//
//        $burgers = [
//            [
//                'nom' => 'Le Simpliste',
//                'category' => 'Classiques',
//                'unit_price' => 2500,
//                'description' => 'Pain artisanal, steak pur bœuf, oignons frais et sauce maison.',
//                'image' => 'burgers/simpliste.jpg',
//            ],
//            [
//                'nom' => 'Double Cheese',
//                'category' => 'Classiques',
//                'unit_price' => 3800,
//                'description' => 'Pour les gourmands : double steak boucher et double dose de cheddar fondu.',
//                'image' => 'burgers/double-cheese.jpg',
//            ],
//            [
//                'nom' => 'Le Dakarois',
//                'category' => 'Signatures',
//                'unit_price' => 4500,
//                'description' => 'Steak épicé, oignons caramélisés à la sénégalaise et sauce yassa secrète.',
//                'image' => 'burgers/dakarois.jpg',
//            ],
//            [
//                'nom' => 'Mafé Style',
//                'category' => 'Signatures',
//                'unit_price' => 5000,
//                'description' => 'Un mélange audacieux : bœuf grillé et une onctueuse sauce arachide travaillée.',
//                'image' => 'burgers/mafe.jpg',
//            ],
//            [
//                'nom' => 'Le Teranga XL',
//                'category' => 'Signatures',
//                'unit_price' => 6500,
//                'description' => 'Le géant de la carte : triple steak, œuf à cheval, bacon de bœuf et crudités.',
//                'image' => 'burgers/teranga.jpg',
//            ],
//            [
//                'nom' => 'Chicken Crispy',
//                'category' => 'Poulet & Fish',
//                'unit_price' => 3500,
//                'description' => 'Filet de poulet pané aux céréales, ultra croustillant et sauce mayo-citron.',
//                'image' => 'burgers/chicken.jpg',
//            ],
//            [
//                'nom' => 'Atlantic Fish',
//                'category' => 'Poulet & Fish',
//                'unit_price' => 4200,
//                'description' => 'Pavé de colin frais, chapelure légère et sauce tartare maison.',
//                'image' => 'burgers/fish.jpg',
//            ],
//            [
//                'nom' => 'Veggie Garden',
//                'category' => 'Végétarien',
//                'unit_price' => 4000,
//                'description' => 'Galette de pois chiches et légumes frais, avocat et pousses d’épinards.',
//                'image' => 'burgers/veggie.jpg',
//            ],
//            [
//                'nom' => 'Halloumi Grill',
//                'category' => 'Végétarien',
//                'unit_price' => 4800,
//                'description' => 'Fromage halloumi grillé, poivrons rôtis et pesto de basilic.',
//                'image' => 'burgers/halloumi.jpg',
//            ],
//            [
//                'nom' => 'P’tit Lion',
//                'category' => 'Menus Kids',
//                'unit_price' => 2200,
//                'description' => 'Mini burger, frites et surprise. Parfait pour les lionceaux !',
//                'image' => 'burgers/kids.jpg',
//            ],
//        ];
//
//        foreach ($burgers as $data) {
//            Burger::create([
//                'nom'          => $data['nom'],
//                'category_id'  => $categories[$data['category']],
//                'unit_price'   => $data['unit_price'],
//                'description'  => $data['description'],
//                'image'        => $data['image'],
//                'stock'        => rand(15, 60),
//                'is_archived'  => false,
//            ]);
//        }
    }
}
