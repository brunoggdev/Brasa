<?php

namespace App\Controllers;

class PaginasController extends BaseController
{
    public function index()
    {
        return renderizaPagina('index');
    }

    /**
    * Tenta renderizar um arquivo com o nome passado na url
    * @author Brunoggdev
    */
    public function mostrar($page):string
    {
        if(! is_file( pasta_app("Views/$page.php") )){
            abortar(404);
        }
        
        return renderizaPagina($page);
    }


    /**
    * Renderiza a página de login ou redireciona caso o usuário já esteja logado
    * @author Brunoggdev
    */
    public function login()
    {
        if( usuario('logado') ){
            return redirect('home');
        }
        
        return renderizaPagina('login');
    }
}
