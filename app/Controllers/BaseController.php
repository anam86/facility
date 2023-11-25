<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\GroupModel;
use App\Models\GroupMenuModel;
use App\Models\MenuModel;
use App\Models\UserModel;

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
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->group    = new GroupModel();
        $this->gmenu    = new GroupMenuModel();
        $this->menu     = new MenuModel();
        $this->user     = new UserModel();
    }

    function reseedGmenu($parameter = null, $id = null)
    {
        $gmenus = $this->gmenu->getAll();
        $this->gmenu->truncate();

        foreach ($gmenus as $gmenu) {
            $data = [
                'allow_view'    => $gmenu->allow_view,
                'allow_create'  => $gmenu->allow_create,
                'allow_edit'    => $gmenu->allow_edit,
                'allow_delete'  => $gmenu->allow_delete,
                'allow_import'  => $gmenu->allow_import,
                'allow_export'  => $gmenu->allow_export,
                'id_group'      => $gmenu->id_group,
                'id_menu'       => $gmenu->id_menu
            ];
    
            $this->gmenu->insertGroupmenu($data);
        }

        if ($id != null) {
            $access = false;
            if ($parameter == "group") {
                $menus = $this->menu->getAll();
    
                foreach ($menus as $menu) {
                    $data = [
                        'allow_view'    => $access,
                        'allow_create'  => $access,
                        'allow_edit'    => $access,
                        'allow_delete'  => $access,
                        'allow_import'  => $access,
                        'allow_export'  => $access,
                        'id_group'      => $id,
                        'id_menu'       => $menu->id
                    ];
            
                    $this->gmenu->insertGroupmenu($data);
                }
            } else {
                $groups = $this->group->getAll();
    
                foreach ($groups as $group) {
                    if ($group->id == 1) { $access = true; }
                    else { $access = false; }
        
                    $data = [
                        'allow_view'    => $access,
                        'allow_create'  => $access,
                        'allow_edit'    => $access,
                        'allow_delete'  => $access,
                        'allow_import'  => $access,
                        'allow_export'  => $access,
                        'id_group'      => $group->id,
                        'id_menu'       => $id
                    ];
            
                    $this->gmenu->insertGroupmenu($data);
                }
            }
        }
    }
}
