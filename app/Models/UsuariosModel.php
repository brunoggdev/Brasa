<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    //Atributos de configuração
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'usuario', 'senha', 'email', 'is_admin'];

    /**
    * Busca os dados de todos os usuários
    * @author Brunoggdev
    */
    public function buscarUsuarios():array
    {
        return $this->select('id, nome, usuario, email, is_admin')->findAll();
    }


    /**
    * Insere um novo usuário no banco de dados
    * @author Brunoggdev
    */
    public function criarUsuario($usuario):bool 
    {
        return $this->insert($usuario);
    }


    /**
    * Edita as informações do usuário especificado
    * @author Brunoggdev
    */
    public function editarUsuario($id, $usuario):bool
    {
        return $this->update($id, $usuario);
    }


    /**
    * Tenta autenticar o usuario e senha no banco de dados
    * @author Brunoggdev
    * @return array|false
    */
    public function autenticar(string $usuario, string $senha)
    {

        $usuario = $this->where(['usuario' => $usuario])->first();
        
        if ( empty($usuario)  ||  !password_verify($senha, $usuario['senha']) ) {
            return false;
        }

        // removendo a senha do array antes de devolver pro controller
        unset($usuario['senha']);

        return $usuario;
    }
}
