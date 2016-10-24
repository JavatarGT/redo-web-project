<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar', 'Auth', 'Acl', 'Session');
	public $helpers = array('Html', 'Form', 'Session', 'AclHtml');

	function beforeFilter() {
	    //Configure AuthComponent
	    $this->Auth->authorize = array(
	        'Controller',
	        'Actions' => array('actionPath' => 'controllers')
	    );
	    
	    $this->Auth->loginAction = array(
	        'controller' => 'users',
	        'action' => 'login',
	        'admin' => false,
	        'plugin' => false
	    );
	    $this->Auth->logoutRedirect = array(
	        'controller' => 'users',
	        'action' => 'login',
	        'admin' => false,
	        'plugin' => false
	    );
	    $this->Auth->loginRedirect = array(
			'controller' => 'pages',
			'action' => 'display',
			'admin' => false,
			'plugin' => false,
			'base' => false
	    );
	}

	function isAuthorized($user) {
	    return false;
	    //return $this->Auth->loggedIn();
	}
}
