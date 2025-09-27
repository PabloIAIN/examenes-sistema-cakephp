<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        // Permitir acciones públicas
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Verificar si el usuario está autenticado
        $user = $this->Authentication->getIdentity();
        if ($user) {
            $this->set('currentUser', $user);
        }
    }
}