<?php 

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GerarJS extends BaseCommand
{
    protected $group = 'dev';
    protected $name = 'make:js';
    protected $description = 'Cria um novo arquivo JavaScript com a base necessária no diretório correto e com o nome desejado';

    public function run(array $params)
    {
        $name = $params[0] ?? CLI::prompt('Qual o nome do arquivo que deve ser criado?', null, 'required|string');
        $dir = ROOTPATH . '/public/js';

        $contents = "/// <reference path=\"jquery.min.js\" />\n/// <reference path=\"helpers_brasa.js\" />\n'use strict';\n/**linhas de configuração acima, evite apagar. @author Brunoggdev*/\n\n";

        if (! is_dir($dir)) {
            CLI::error("The specified directory '{$dir}' does not exist.");
            return;
        }

        $file = rtrim($dir, '/') . '/' . $name . '.js';

        if (file_exists($file)) {
            CLI::error("The file '{$file}' already exists.");
            return;
        }

        if (write_file($file, $contents)) {
            CLI::write("O arquivo '{$name}.js' foi criado com sucesso.", 'green');
        } else {
            CLI::error("Erro ao criar o arquivo '{$name}.js'.");
        }
    }
}
