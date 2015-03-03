<?php
class MessagesController extends AppController {

	public function admin_index() {
        $this->loadModel('Contact');

        $msg = $this->Contact->find('all');
        $this->set('messages', $msg);
    }

    //Suppression message
    public function admin_delMSG(){
        $this->autoRender=false;
        $this->Session->delete('Message.flash');
        $this->loadModel('Contact');
        $this->Contact->delete($this->request->params['pass'][0]);

        $this->Session->setFlash(__('Suppression r&eacute;ussi'));
        
        return $this->redirect(array('controller'=> 'messages','action' => 'index', 'admin'=>true));
    }
}