<?php

namespace App\Helpers;

use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\Files\UploadedFile;


/**
 * Helper de upload de arquivos para a pasta public
 * @author Brunoggdev
*/
class Upload
{
    /**
     * Faz o upload de um único arquivo para o caminho desejado e retorna esse caminho.
     * @param UploadedFile $arquivo como objeto do tipo UploadedFile
     * @param string $caminho_publico Caminho específico dentro da pasta public que deve ficar o upload
     * @return string caminho onde está localizado o arquivo.
     * @author Brunoggdev
    */
    public static function unico(UploadedFile $arquivo, string $caminho_publico = ''):string
    {
        $caminho_publico = trim($caminho_publico, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        static::fazerUpload($arquivo, FCPATH . $caminho_publico);

        return $caminho_publico . $arquivo->getName();
    }


    /**
    * Faz o upload dos arquivos desejados para a pasta public e retorna os caminhos.
    * @param UploadedFile[] $arquivos array de objetos do tipo UploadedFile
    * @return array array com caminhos publicos dos arquivos do upload.
    * @author Brunoggdev
    */
    public static function varios(array $arquivos, string $caminho_publico = ''):array
    {
        $caminho_publico = trim($caminho_publico, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        foreach ($arquivos as $arquivo) {   
            static::fazerUpload($arquivo, FCPATH . $caminho_publico);
            $caminhos[] = $caminho_publico . $arquivo->getName();
        }
            
        return $caminhos ;
    }


    /**
     * Tenta deletar da pasta public o(s) arquivo(s) informados.
     * @param string|array $arquivos Caminho ou array de caminhos a serem deletados da pasta public
     * @author Brunoggdev
    */
    public static function deletar(string|array $arquivo):void
    {
        if (is_array($arquivo)) {
            foreach ($arquivo as $item) {
                static::deletarArquivo($item);
            }

            return;
        }

        static::deletarArquivo($arquivo);
    }


    private static function fazerUpload(UploadedFile $arquivo, $caminho, ?string $nome = null):string|false
    {
        if(! $arquivo instanceof UploadedFile){
            throw HTTPException::forInvalidFile();
        }
        
        return $arquivo->move($caminho, $nome);
    }


    private static function deletarArquivo(string $arquivo):void
    {
        if(file_exists(FCPATH . $arquivo)){
            unlink(FCPATH . $arquivo);
        }
    }
}
