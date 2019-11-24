<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = array(
            [
                'name' => 'Aluguel de Brinquedos'
            ],
            [
                'name' => 'Construção Civil'
            ],
            [
                'name' => 'Eletônica'
            ],
            [
                'name' => 'Fretes'
            ],
            [
                'name' => 'Informática e Computadores'
            ],
            [
                'name' => 'Transporte Alternativo'
            ],
            [
                'name' => 'Revendedores'
            ],
            [
                'name' => 'Montadores de Móveis'
            ],
            [
                'name' => 'Limpeza Doméstica'
            ],
            [
                'name' => 'Profissionais de Beleza'
            ],
            [
                'name' => 'Outros'
            ],
            
        );
        foreach($dados as $dado){
            DB::table('categories')->insert($dado);
        }
    }
}
