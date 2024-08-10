<?php

namespace Database\Seeders;

use App\Models\Gift;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Eduarda Cruz',
            'email' => 'eduarda@furquim.com.br',
            'admin' => true,
            'password' => Hash::make('@Sucesso1243'),
        ]);

        // // User::factory()->create([
        // //     'name' => 'Jeandreo da Cruz Furquim',
        // //     'email' => 'jeandreofur@gmail.com',
        // //     'password' => Hash::make('Inc@ns4v3l_2024'),
        // // ]);

        // // Gift::create([
        // //     'name' => 'Jogo de Louça',
        // // ]);

        // // Gift::create([
        // //     'name' => 'Toalhas',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Conjunto de Talheres',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Jogo de Panelas',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Aparelho de Jantar',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Cafeteira Elétrica',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Liquidificador',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Panela de Pressão',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Faqueiro',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Assadeiras',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Conjunto de Taças',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Copos de Vidro',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Jogo de Lençol',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Frigideira Antiaderente',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Edredom',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Travessa de Vidro',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Cortinas',
        // // ]);
        
        // // Gift::create([
        // //     'name' => 'Tapete',
        // // ]);

    }
}
