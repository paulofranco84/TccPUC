<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController {

    public function novo() {
        $data = [
            'titulo' => 'Realize o login',
        ];

        return view('Login/novo', $data);
    }

    public function criar() {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            if($this->request->getPost('is_google')){
                $google = true;
                $email = $this->request->getPost('email_google');
                $password = $this->request->getPost('password_google');
                $nome = $this->request->getPost('nome_google');
            }else{
                $google = false;    
            }
            
            $autenticacao = service('autenticacao');

            if ($autenticacao->login($email, $password, $google)) {
                $usuario = $autenticacao->pegaUsuarioLogado();

                if (!$usuario->is_admin) {
                    if (session()->has('carrinho')) {
                        return redirect()->to(site_url('checkout'));
                    }

                    return redirect()->to(site_url('/'));
                }

                return redirect()->to(site_url('admin/home'))->with('sucesso', "Olá $usuario->nome, que bom que está de volta");
            } else {
                if($google){
                    $session = session();
                    $dadosGoogle = [
                        'nome'  => $nome,
                        'email'     => $email,
                        'password' => $password,
                    ];
                    $session->set($dadosGoogle);
                    return redirect()->to(site_url('registrar'));
                }
                return redirect()->back()->with('atencao', 'Não encontramos suas credenciais de acesso');
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout() {
        service('autenticacao')->logout();
        return redirect()->to(site_url('login/mostraMensagemLogout'));
    }

    public function mostraMensagemLogout() {
        return redirect()->to(site_url("login"))->with('info', 'Esperamos ver você novamente');
    }

}
