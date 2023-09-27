<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use function PHPSTORM_META\type;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    /**
     * Higieniza um dado de acordo com seu tipo
     * @author Brunoggdev
    */
    public function higienizar(mixed $dado):mixed
    {
        return match (gettype($dado)) {
            'array' => higienizaArray($dado),
            'string' => strip_tags($dado),
            default => $dado
        };
    }

    /**
    * Retorna parametros enviados por post já higienizados.
    * @param array|string|null $index — Index para resgatar do $_POST.
    * @author Brunoggdev
    */
    public function dadosPost($index = null):mixed
    {
        return $this->higienizar(
            $this->request->getPost($index)
        );
    }


    /**
    * Retorna parametros enviados por get já higienizados.
    * @author Brunoggdev
    */
    public function dadosGet($index = null):mixed
    {
        return $this->higienizar(
            $this->request->getGet($index)
        );
    }
}
