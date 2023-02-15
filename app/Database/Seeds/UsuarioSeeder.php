<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run() {
        $usuarioModel = new \App\Models\UsuarioModel;
        
        $usuario = [
            'nome' => 'Paulo Henrique Zuliani Franco',
            'email' => 'paulinhofranco@gmail.com',
            'password' => '123456',
            'cpf' => '325.598.258-80',
            'telefone' => '(19) 99777-9726',
            'is_admin' => true,
            'ativo' => true
        ];

        $usuarioModel->skipValidation(true)->protect(false)->insert($usuario);
    }
}
