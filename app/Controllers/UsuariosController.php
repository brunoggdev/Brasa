<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{

    /**
    * Aqui pode vir uma função para listar todos os usuarios
    * @author Brunoggdev
    */
    public function index()
    {
        $usuarios = (new UsuariosModel)->buscarUsuarios(); 
        if($this->request->isAJAX()){
            return $this->response->setJSON($usuarios);
        }
        return renderizaPagina('usuarios', ['usuarios' => $usuarios]);
    }


    /**
    * Recupera os dados de um novo usuário a ser criado
    * @author Brunoggdev
    */
    public function criar()
    {
        $usuario = $this->dadosPost();
        $usuario['senha'] = encriptar($usuario['senha']);

        $resultado = (new UsuariosModel)->criarUsuario($usuario);

        return redirect('usuarios')->with('mensagem', setMsgBrasa($resultado));
    }


    /**
    * Recupera as informações enviadas por post para edição do usuário
    * @author Brunoggdev
    */
    public function editar()
    {
        $id = $this->dadosPost('id');

        $usuario = $this->dadosPost(['nome','usuario','email', 'is_admin']);

        if(!empty( $senha = $this->dadosPost('senha') )){
            $usuario['senha'] = encriptar($senha);
        }
        
        $resultado = (new UsuariosModel)->editarUsuario($id, $usuario);

        return redirect('usuarios')->with('mensagem', setMsgBrasa($resultado));
    }


    /**
     * Tenta fazer login do usuario
     * @author Brunoggdev
     */
    public function login()
    {
        $usuario = $this->dadosPost('usuario');
        $senha = $this->dadosPost('senha');
        
        $usuarioAutenticado = (new UsuariosModel)->autenticar($usuario, $senha);

        if (! $usuarioAutenticado) {
            return redirect('login')->with('email', $usuario)->
            with('mensagem', [
                'texto' => 'Email e/ou senha inválidos.',
                'cor' => 'danger'
            ]);
        }

        $usuarioAutenticado['logado'] = true;

        session()->set('usuario', $usuarioAutenticado);

        return redirect('home'); 
    }


    /**
    * Destroi a sessão e redireciona para pagina de login
    * @author Brunoggdev
    */
    public function logout()
    {
        session()->remove('usuario');

        return redirect('login')->with('mensagem', [
            'texto' => 'Logout efetuado com sucesso.',
            'cor' => 'success'
        ]);
    }
}