<?php

namespace App\Libraries;

class Autenticacao{
    private $usuario;

    public function login(string $email, string $password, int $google){
        $usuarioModel = new \App\Models\UsuarioModel();
        $usuario = $usuarioModel->buscaUsuarioPorEmail($email);

        if($usuario === null){
            return false;
        }

        if(!$usuario->verificaPassword($password) && !$google){
            return false;
        }

        if(!$usuario->ativo){
            return false;
        }

        $this->logaUsuario($usuario);

        return true;
    }

    public function logout(){
        session()->destroy();
    }

    public function pegaUsuarioLogado(){
        if($this->usuario ===null){
            $this->usuario = $this->pegaUsuarioDaSessao();
        }

        return $this->usuario;
    }

    public function estaLogado(){
        return $this->pegaUsuarioLogado() !== null;
    }

    private function pegaUsuarioDaSessao(){
        if(!session()->has('usuario_id')){
                return null;
        }

        $usuarioModel = new \App\Models\UsuarioModel();

        $usuario = $usuarioModel->find(session()->get('usuario_id'));

        if($usuario && $usuario->ativo){
            return $usuario;
        }
    }

    private function logaUsuario(object $usuario){
        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);

    }
}