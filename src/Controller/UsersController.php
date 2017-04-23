<?php
namespace App\Controller;

use App\Controller\AppController;
/**
* Controller para gerenciamento de Users
@copyright Copyright (c) Marcio Gimenez
*/
class UsersController extends AppController
{
	public function login()
    {
    	if($this->request->is('post')){
    		$user = $this->Auth->identify();

    		if($user){
    			$this->Auth->setUser($user);
    			$this->Flash->success('Logado com sucesso');
    			return $this->redirect($this->Auth->redirectUrl());
    		}else{
    			$this->Flash->error('Erro ao Logar');
    		}
    	}
    }
    public function logout(){
    	$this->Auth->logout();
    	return $this->redirect(['action' =>'login']);
    }
	public function index(){
		$users = $this->paginate($this->Users);
		//$this->set(['Users' => $Users]);
		$this->set(compact('users'));
	}
	public function add(){
		$usuario = $this->Users->newEntity();
		if($this->request->is('post')):
			var_dump($this->request->data);
			$usuario = $this->Users->patchEntity($usuario,$this->request->data);
			if($this->Users->save($usuario)){
				$this->Flash->success('Salvo com Sucesso');
				$this->redirect(['controller'=>'Users','action'=>'index']);
			}else{
				$this->Flash->error('Não foi salvo');

			}
			
		endif;
		$this->set(compact('usuario'));	
	}
	public function edit($id){
		$usuario = $this->Users->get($id);
		if($this->request->is(['post','put'])):
			$usuario = $this->Users->patchEntity($usuario,$this->request->data);
			if($this->Users->save($usuario)){
				$this->Flash->success('Salvo com Sucesso');
				$this->redirect(['controller'=>'Users','action'=>'index']);
			}else{
				$this->Flash->error('Não foi salvo');

			}
			
		endif;	
		$this->set(compact('usuario'));	
	}
	public function view($id){
		$usuario = $this->Users->get($id);
		$this->set(compact('usuario'));	
	}
	public function delete($id){
		$this->request->allowMethod(['post','delete']);
		$usuario = $this->Users->get($id);
		if($this->Users->delete($usuario)){
			$this->Flash->success('Excluído com sucesso');
		}else{
			$this->Flash->error('Não pode ser excluído');
		}
		$this->redirect(['controller'=>'Users','action'=>'index']);

	}
}