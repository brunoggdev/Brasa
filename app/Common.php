<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */


/**
 * Constante de veersão usada principalmente para cache bursting.
 * @author Brunoggdev
 * @origem Common.php
*/
define('VERSION', '0.0.0');

/**
* Retorna o caminho da pasta app e pode receber um caminho extra para concatenação.
* @author Brunoggdev
* @origem Common.php
*/
function pasta_app(string $extraPath = ''):string
{
    return ROOTPATH . "/app/$extraPath";
}

/**
* Retorna o caminho pra pasta public e pode receber um caminho extra para concatenação.
* @author Brunoggdev
* @origem Common.php
*/
function pasta_public(string $extraPath = ''):string
{
    return ROOTPATH . "/public/$extraPath";
}

/**
* Renderiza uma pagina generica de 404
* @author Brunoggdev
* @origem Common.php
*/
function abortar(int $codigo_http)
{
    http_response_code($codigo_http);
    
    return match ($codigo_http) {
        404 => throw new CodeIgniter\Exceptions\PageNotFoundException()
    };
}


/**
* Importa com a possibilidade de defer o arquivo JavaScript com o nome informado caso exista.
* @author Brunoggdev
* @origem Common.php
*/
function importarJS(string $nomeArquivo, bool $defer = false)
{
    $arquivo = "js/$nomeArquivo.js";
    if (file_exists($arquivo)) {
        return '<script '.($defer?'defer ':'').' src="'.base_url("$arquivo?v=").VERSION.'"></script>';
    }
}



/**
* Renderiza um template podendo receber parametros opcionais
* @author Brunoggdev
* @origem Common.php
*/
function template(string $template, ?array $params = [])
{
    if(file_exists(pasta_app("Views/templates/$template.php"))){
        return view("templates/$template", $params);
    }
}


/**
* Renderiza header, body e footer, além possíveis modais e/ou javascript de uma pagina.
* @author Brunoggdev
* @origem Common.php
*/
function renderizaPagina(string $page, array $data = []):string
{
    return view('templates/header', $data)
        .view($page)
        .importarJS($page, true)
        .template("modais_$page")
        .view('templates/footer');
}


/**
* Retorna uma resposta generica baseado na condição informada no padrão 
* recomendado pelo Brasa para repostas flash (array associativo com texto e cor),
* sendo possível também informar um array customizado para cada caso.
* @author Brunoggdev
* @origem Common.php
*/
function setMsgBrasa(bool $condicao, ?array $erro = null, ?array $sucesso = null, ):array
{

    if( $condicao ){

        return $sucesso ?? [
            'texto' => 'Operação realizada com sucesso.',
            'cor' => 'success'
        ];

    }else{

        return $erro ?? [
            'texto' => 'Houve um problema ao realizar esta operação.',
            'cor' => 'danger'
        ];
        
    }
}


/**
* Utilizado inicialmente para facilmente acessar a getMsgBrasa como mensagem flash, 
* retorna, caso exista, o index desejado de um array associativo guardado na session.
* @param string $index 'texto' ou 'cor'  
* @author Brunoggdev
*/
function getMsgBrasa(string|int $index, ?string $sessionKey = 'mensagem'):mixed
{
    return session($sessionKey)[$index] ?? '';
}


/**
* Higieniza todos os campos de um array
* @author Brunoggdev
* @origem Common.php
*/
function higienizaArray(array $array):array
{
    // O "&" antes da variavel indica que estou alterando o 
    // array original e não apenas uma cópia dele;
    foreach ($array as &$item) {
        if (is_array($item)) {
            $item = higienizaArray($item);
        } else {
            $item = strip_tags($item);
        }
    }
    return $array;
}

/**
* Retorna o valor desejado da sessão do usuário ou, caso  
* nenhum valor seja informado, se a sessão está ativa.
* @author Brunoggdev
* @origem Common.php
*/
function usuario(string $index = 'logado'):mixed
{
    if(empty( session('usuario') )){
        return '';
    }

    return strip_tags( session('usuario')[$index] );
}


/**
* Retorna a criptografia da senha informada no padrão adotado pelo PHP
* @author Brunoggdev
* @origem Common.php
*/
function encriptar(string $senha):string
{
    return password_hash($senha, PASSWORD_DEFAULT);
}


/**
* Extrai e retorna um item de um array associativo, modificando o array original (retorna null caso a chave não seja encontrada.)
* @author Brunoggdev
*/
function extrairItem(string $chave, array &$array):mixed
{
    if(isset($array[$chave])){
        $item = $array[$chave];
        unset($array[$chave]);
    }else{
        $item = null;
    }
    return $item;
}


/**
* Extrai um item de um array associativo e retorna outro array associativo com a chave retirada, modificando o array original (retorna null caso a chave não seja encontrada.)
* @author Brunoggdev
*/
function extrairArray(string $chave, array &$array):mixed
{
    if(isset($array[$chave])){
        $item = $array[$chave];
        unset($array[$chave]);
    }else{
        $item = null;
    }
    
    return [$chave => $item];
}


/**
* Converte o valor de real em centavos.
* @author Brunoggdev
*/
function paraCentavos(string|float|int $price) {
    return match(gettype($price)) {
        'integer' => $price * 100,
        'float' => intval(round($price * 100)),
        'string' => intval(str_replace(',', '', str_replace('.', '', $price))),
        default => null,
    };
}


/**
* Converte o valor de centavos em real.
* @author Brunoggdev
*/
function paraReais($price) {
    return number_format(($price / 100), 2, ',', '.');
}


/**
 * Edita todos as colunas (mesma chave em todos os arrays) da coleção de arrays associativos
 * informada utilizando a(s) callback(s) informada(s).
 * @param array $itens Array de arrays associativos
 * @param string|array $coluna Chave(s) presente(s) em cada um dos arrays.
 * @param string|array|callable $callback Função (ou funções) a ser executada na coluna.
* @author Brunoggdev
*/
function editarColunaArray(array $itens, string|array $colunas, string|array|callable $callbacks): array
{
    if (!is_array($colunas)) {
        $colunas = array($colunas);
    }

    if (!is_array($callbacks)) {
        $callbacks = array($callbacks);
    }

    $num_colunas = count($colunas);
    $num_callbacks = count($callbacks);

    $result = [];

    foreach ($itens as $item) {
        for ($i = 0; $i < $num_colunas; $i++) {
            $coluna = $colunas[$i];
            $callback = $callbacks[$i % $num_callbacks];
            $item[$coluna] = $callback($item[$coluna]);
        }
        $result[] = $item;
    }

    return $result;
}


/**
 * Corta uma string com "..." caso passe do tamanho informado (45 padrão);
 * @author Brunoggdev
*/
function cortaString(string $str, int $tam = 45) {
    if (strlen($str) > $tam) {
        return substr($str, 0, $tam) . "...";
    } else {
        return $str;
    }
}  


/**
* Retorna a quantidade de itens vazios no array, 
* sendo útil para diversas validações
* @param $array Array a ser checado
* @author Brunoggdev
*/
function itensVazios(array $array):int
{
    $contador = 0;
    foreach ($array as $key => $value) {
        if (!isset($value) || $value === '') {
            $contador++;
        }
    }

    return $contador;
}