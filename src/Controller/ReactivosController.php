<?php
declare(strict_types=1);

namespace App\Controller;

class ReactivosController extends AppController
{
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        
        // Los usuarios base solo ven sus propios reactivos
        if ($user->role === 'usuariobase') {
            $query = $this->Reactivos->find()->where(['user_id' => $user->id]);
        } else {
            // Los administradores ven todos
            $query = $this->Reactivos->find()->contain(['Users']);
        }

        $reactivos = $this->paginate($query);
        $this->set(compact('reactivos'));
    }

    public function view($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $reactivo = $this->Reactivos->get($id, contain: ['Users']);

        // Verificar permisos
        if ($user->role === 'usuariobase' && $reactivo->user_id != $user->id) {
            $this->Flash->error('No tienes permisos para ver este reactivo.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('reactivo'));
    }

    public function add()
    {
        $reactivo = $this->Reactivos->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Authentication->getIdentity()->id;
            
            $reactivo = $this->Reactivos->patchEntity($reactivo, $data);
            if ($this->Reactivos->save($reactivo)) {
                $this->Flash->success(__('El reactivo ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El reactivo no pudo ser guardado. Por favor, intenta nuevamente.'));
        }

        $especialidades = \App\Model\Table\ReactivosTable::getEspecialidades();
        $this->set(compact('reactivo', 'especialidades'));
    }

    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $reactivo = $this->Reactivos->get($id, contain: []);

        // Verificar permisos
        if ($user->role === 'usuariobase' && $reactivo->user_id != $user->id) {
            $this->Flash->error('No tienes permisos para editar este reactivo.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $reactivo = $this->Reactivos->patchEntity($reactivo, $this->request->getData());
            if ($this->Reactivos->save($reactivo)) {
                $this->Flash->success(__('El reactivo ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El reactivo no pudo ser guardado. Por favor, intenta nuevamente.'));
        }

        $especialidades = \App\Model\Table\ReactivosTable::getEspecialidades();
        $this->set(compact('reactivo', 'especialidades'));
    }

    public function delete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $this->request->allowMethod(['post', 'delete']);
        $reactivo = $this->Reactivos->get($id);

        // Verificar permisos
        if ($user->role === 'usuariobase' && $reactivo->user_id != $user->id) {
            $this->Flash->error('No tienes permisos para eliminar este reactivo.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Reactivos->delete($reactivo)) {
            $this->Flash->success(__('El reactivo ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El reactivo no pudo ser eliminado. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}