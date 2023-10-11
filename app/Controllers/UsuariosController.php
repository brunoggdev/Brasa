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
        
        $usuario_autenticado = (new UsuariosModel)->autenticar($usuario, $senha);

        if (! $usuario_autenticado) {
            return redirect('login')
                ->with('usuario_antigo', $usuario)
                ->with('mensagem', [
                    'texto' => 'Usuario e/ou senha inválidos.',
                    'cor' => 'danger'
                ]);
        }

        $usuario_autenticado['logado'] = true;

        session()->set('usuario', $usuario_autenticado);
        session()->regenerate();

        return redirect('home'); 
    }


    /**
    * Destrói a sessão e redireciona para pagina de login
    * @author Brunoggdev
    */
    public function logout()
    {
        session()->remove('usuario');
        session()->destroy();

        return redirect('login');
    }
}