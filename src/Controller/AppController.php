<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    // public function initialize()
    // {
    //     parent::initialize();

    //     $this->loadComponent('RequestHandler', [
    //         'enableBeforeRedirect' => false,
    //     ]);
    //     $this->loadComponent('Flash');
    // }

     public function initialize()
    {
       parent::initialize();
        $this->loadComponent('RequestHandler', ['enableBeforeRedirect' => false]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);
       
        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

    }

    public function beforeRender(Event $event){
        if($this->response->getStatusCode() == 200) {
            $user = $this->Auth->user();
            $this->viewBuilder()->setTheme('InspiniaTheme');
            $title = 'Mulligans';

            // pr($user['role']); die;
            $sideNavData = ['id'=>$user['id'],'first_name' => $user['first_name'],'last_name' => $user['last_name'],'role_name' => $user['role']['name'],];

            $nav = $this->checkLink(Configure::read('NavigationMenu'), $user['role']['name']);

            $this->set('sideNavData', $sideNavData);
            $this->set('title', $title);
            $this->set('sideNav',$nav['children']);
        }
    }   

    public function checkLink($nav = [], $role = false){
    $currentLink = [
    'controller' => $this->request->params['controller'],
    'action' => $this->request->params['action']
    ];
    $check = 0;
    // pr($nav); die;
    if($nav) {

    foreach($nav as $key => &$value){
    //Figure out active class
      if($value['link'] == '#'){
        $response = $this->checkLink($value['children'], $role);
        $value['children'] = $response['children'];
        $value['active'] = $response['active'];
      }else {
        // pr('here'); die;
        if(!is_array($value['link'])){
          $value['active'] = '';

        }else{
          $value['active'] = empty(array_diff($currentLink, $value['link'])) ? 1 : 0;         
        }
      }

      if(isset($value['active']) && $value['active']){
        $check = 1;
      }
    //Figure out whether to show or not
      if($role){
        $show = 0;
    //role is not in show_to_roles
        if(empty($value['show_to_roles'])) {
          $show = 1;
        } elseif (in_array($role, $value['show_to_roles'])) {
          $show = 1;
        }
        if($show){
          if(empty($value['hide_from_roles'])) {
            $show = 1;
          } elseif (in_array($role, $value['hide_from_roles'])) {
            $show = 0;
          }  
        }
        $value['show'] = $show;
      } else {
        $value['show'] = 1;
      }
    }
    }
    return ['children' => $nav, 'active' => $check];
  }

}
