<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nibuss Solucoes em Tecnologia',
            'username' => 'nibuss',
            'phone' => '+5548999506664',
            'gender' => 'Male',
            'dob' => '1980-03-09',
            'user_type' => 'Administrator',
            'email' => 'mail@nibuss.com.br',
            'password' => bcrypt('j29m09a04')
        ]);

        Client::create([
            'name' => 'PLASZOM ZOMER INDUSTRIA DE PLASTICOS LTDA - UNI III',
            'short_name' => 'PLASZOM III',
            'cnpj' => '85.285.963/0003-01',
            'phone' => '(48) 3466 6313',
            'email' => 'cliche301@plaszom.com.br'
        ]);
        Client::create([
            'name' => 'COPAZA DESCARTAVEIS PLASTICOS LTDA',
            'short_name' => 'COPAZA',
            'cnpj' => '85.151.504/0001-65',
            'phone' => '(48) 3461 3024',
            'email' => 'vendas_impressos@copaza.com.br'
        ]);
        Client::create([
            'name' => 'CRISTALCOPO DESCARTAVEIS S/A',
            'short_name' => 'CRISTAL',
            'cnpj' => '05.316.470/0003-44',
            'phone' => '(48) 3467 1600',
            'email' => 'arte@cristalcopo.com.br'
        ]); 
        Client::create([
            'name' => 'THERMOVAC EMBALAGENS PLÁSTICAS LTDA',
            'short_name' => 'THERMOVAC',
            'cnpj' => '018.133.680/0001-31',
            'phone' => '(48) 3440 0300',
            'email' => 'artes@thermovac.com.br'
        ]);                         
    }
}
