<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Dados de demonstração para mostrar a loja a funcionar no portfolio.
 * Contas: admin / password  e  demo / password
 */
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $disk = Storage::disk('public');

        // Imagens usadas pela app que não estão no repositório.
        $copy = function (string $from, string $to) use ($disk) {
            if (! $disk->exists($to)) {
                $disk->put($to, file_get_contents(public_path($from)));
            }
        };
        $copy('assets/images/userprofilepic.webp', 'images/1679682585Sample_User_Icon.png');
        $copy('assets/images/userprofilepic.webp', 'images/Defaul_User_Image.png');
        $copy('assets/images/client-01.png', 'images/logo.jpg');

        DB::table('roles')->upsert([
            ['id' => 1, 'roleName' => 'Admin', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'roleName' => 'User', 'created_at' => $now, 'updated_at' => $now],
        ], ['id']);

        $users = [
            ['id' => 1, 'username' => 'admin', 'name' => 'Admin', 'surname' => 'AgriShop', 'email' => 'admin@agrishop.test', 'NIF' => 100000001, 'IBAN' => 'PT50000000000000000000001', 'roleID' => 1],
            ['id' => 2, 'username' => 'demo', 'name' => 'Demo', 'surname' => 'User', 'email' => 'demo@agrishop.test', 'NIF' => 100000002, 'IBAN' => 'PT50000000000000000000002', 'roleID' => 2],
        ];
        foreach ($users as $u) {
            DB::table('users')->upsert([$u + [
                'password' => Hash::make('password'),
                'phoneNumber' => '910000000',
                'address' => 'Rua das Flores 1',
                'postalCode' => '5000-000',
                'locality' => 'Vila Real',
                'src' => '/storage/images/1679682585Sample_User_Icon.png',
                'created_at' => $now,
                'updated_at' => $now,
            ]], ['id']);
        }

        $categories = ['Fruit', 'Vegetables', 'Tools', 'Seeds'];
        foreach ($categories as $i => $name) {
            DB::table('categories')->upsert([['id' => $i + 1, 'name' => $name, 'created_at' => $now, 'updated_at' => $now]], ['id']);
        }

        $products = [
            ['Fresh apples', 1.99, 1, 'Crunchy apples from the Douro valley, sold by the kilo.'],
            ['Organic carrots', 1.49, 2, 'Locally grown organic carrots, harvested this week.'],
            ['Garden hoe', 18.90, 3, 'Steel garden hoe with a wooden handle.'],
            ['Tomato seeds', 2.50, 4, 'Pack of heirloom tomato seeds, about 50 seeds.'],
            ['Potatoes 5kg', 4.99, 2, 'Bag of white potatoes, ideal for cooking.'],
            ['Pruning shears', 12.50, 3, 'Sharp pruning shears for vines and fruit trees.'],
        ];
        foreach ($products as $i => [$name, $price, $category, $description]) {
            $image = sprintf('images/product_%02d.jpg', $i + 1);
            $copy(sprintf('assets/images/product_%02d.jpg', $i + 1), $image);

            DB::table('products')->upsert([[
                'id' => $i + 1,
                'name' => $name,
                'price' => $price,
                'iva' => 23,
                'categoryID' => $category,
                'userID' => 2,
                'src' => '/storage/'.$image,
                'description' => $description,
                'created_at' => $now,
                'updated_at' => $now,
            ]], ['id']);
        }
    }
}
