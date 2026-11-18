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

        // As fotos vêm do template do projeto (roupa de campo e artesanato).
        $categories = ['Workwear', 'Knitwear', 'Handmade', 'Seeds'];
        foreach ($categories as $i => $name) {
            DB::table('categories')->upsert([['id' => $i + 1, 'name' => $name, 'created_at' => $now, 'updated_at' => $now]], ['id']);
        }

        $products = [
            ['Work boots', 59.90, 1, 'Waterproof leather boots for long days in the field.'],
            ['Field jacket', 74.50, 1, 'Warm cotton jacket with hood, made for cold mornings.'],
            ['Wool scarves', 19.90, 2, 'Pack of two hand-knitted wool scarves.'],
            ['Knitted snowmen', 12.00, 3, 'Pair of handmade knitted snowmen from local artisans.'],
            ['Wool sweater', 39.90, 2, 'Thick striped sweater knitted with sheep wool.'],
            ['Tree ornament', 6.50, 3, 'Handmade felt ornament for the Christmas tree.'],
        ];
        foreach ($products as $i => [$name, $price, $category, $description]) {
            $image = sprintf('images/product_%02d.jpg', $i + 1);
            $copy(sprintf('assets/images/product_%02d.jpg', $i + 1), $image);

            DB::table('products')->upsert([[
                'id' => $i + 1,
                'name' => $name,
                'price' => $price,
                'iva' => 0.23,
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
