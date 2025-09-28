<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function display(...$path)
    {
        if (!$path) {
            return $this->redirect(['action' => 'dashboard']);
        }
        
        $page = $subpage = null;
        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        
        $this->set(compact('page', 'subpage'));
        
        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function dashboard()
    {
        $user = $this->Authentication->getIdentity();

        // Cargar estadísticas según el rol
        if ($user->role === 'administrador') {
            $this->loadModel('Users');
            $this->loadModel('Reactivos');

            $totalUsers = $this->Users->find()->count();
            $totalReactivos = $this->Reactivos->find()->count();
            
            $reactivosPorEspecialidad = $this->Reactivos->find()
                ->select(['area_especialidad', 'count' => $this->Reactivos->find()->func()->count('*')])
                ->groupBy('area_especialidad')
                ->toArray();

            $this->set(compact('totalUsers', 'totalReactivos', 'reactivosPorEspecialidad'));
        } else {
            $this->loadModel('Reactivos');
            
            $misReactivos = $this->Reactivos->find()
                ->where(['user_id' => $user->id])
                ->count();

            $this->set(compact('misReactivos'));
        }

        $this->set(compact('user'));
    }

   public function setupDatabase()
    {
        $this->autoRender = false;
        
        try {
            // Verificar conexión a base de datos
            $connection = \Cake\Datasource\ConnectionManager::get('default');
            $connection->connect();
            echo "Database connection successful<br>";
            
            // Intentar cargar plugin Migrations
            if (!$this->plugins()->has('Migrations')) {
                $this->loadPlugin('Migrations');
            }
            echo "Migrations plugin loaded<br>";
            
            // Ejecutar migrations
            $migrations = new \Migrations\Migrations();
            echo "Running migrations...<br>";
            $migrations->migrate();
            echo "Migrations completed successfully<br>";
            
            // Ejecutar seeds
            echo "Running seeds...<br>";
            $migrations->seed();
            echo "Seeds completed successfully<br>";
            
            echo "<h2>Database setup completed!</h2>";
            echo "<a href='/users/login'>Go to Login</a>";
            
        } catch (\Exception $e) {
            echo "<h2>Error occurred:</h2>";
            echo "<p>" . $e->getMessage() . "</p>";
            echo "<p>File: " . $e->getFile() . "</p>";
            echo "<p>Line: " . $e->getLine() . "</p>";
        }
    }
}