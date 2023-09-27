<?php 

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GerarENV extends BaseCommand
{
    protected $group = 'dev';
    protected $name = 'make:env';
    protected $description = 'Cria um novo arquivo .env padrão para ser configurado';

    public function run(array $params)
    {
        $source = ROOTPATH . '/app/Commands/envExample';
        $destination = ROOTPATH . '.env';

        if (file_exists($destination)) {
            CLI::error("Aparentemente o aqruivo .env já existe.");
            return;
        }

        if (copy($source, $destination)) {
            CLI::write("Arquivo .env gerado com sucesso.", 'green');
        } else {
            CLI::error("Erro ao gerar o arquivo .env.");
        }
    }
}
