<?php
class MyworkController extends AppController {

	public function admin_index() {
		$this->loadModel('Work');

		//Ajout projet
        if($this->request->is('post')){
                $icon = $_FILES['image'];

                //Upload photo
                    if ($icon['error'] === UPLOAD_ERR_OK) {
                        $id = String::uuid();
                        if (move_uploaded_file($icon['tmp_name'], APP.'webroot/uploads'.DS.$id)) {
                            
                        }
                }
                if ($this->Work->save($this->request->data, $this->Work->saveField('img_path', $id))){
                    $this->Session->setFlash(__('Ajout r&eacute;ussi'));
                } else {
                    $this->Session->setFlash(__('Echec ajout'));
                } 
        } 
	}

	public function fetchWork(){
        $this->layout = null ;
        $this->autoRender=false;
        $this->loadModel('Work');

        $links = $this->Work->find('all');
            $this->response->body(json_encode($links));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
	}

	public function delWrk(){
        $this->autoRender=false;
        $this->Session->delete('Message.flash');
        $this->loadModel('Work');
        $this->Work->delete($this->request->params['pass'][0]);

        $this->Session->setFlash(__('Suppression r&eacute;ussi'));
        
        return $this->redirect(array('controller'=> 'mywork','action' => 'index', 'admin'=>true));
	}

    public function editWrk(){
        $this->loadModel('Work');
        $id = $this->request->params['pass'][0];
        $work = $this->Work->find('first', array('conditions' => array('id' => $id)));

        $this->set('work', $work);

        if($this->request->is('post')){
            $this->Work->id = $id;
                $icon = $_FILES['image'];

                //Upload photo
                    if ($icon['error'] === UPLOAD_ERR_OK) {
                        $id = String::uuid();
                        if (move_uploaded_file($icon['tmp_name'], APP.'webroot/uploads'.DS.$id)) {
                            
                        }
                }
                if ($this->Work->save($this->request->data, $this->Work->saveField('img_path', $id))){
                    $this->Session->setFlash(__('Modification r&eacute;ussi'));
                } else {
                    $this->Session->setFlash(__('Echec modification'));
                } 
        } 
    }
}