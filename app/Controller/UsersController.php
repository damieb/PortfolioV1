<?php
class UsersController extends AppController {

    //Check messages
    public function admin_checkMSG(){
        $this->layout = null ;
        $this->autoRender=false;
        $this->loadModel('Contact');

        $data = $this->Contact->find('count', array('conditions' => array('Contact.read =' => '1')));
            $this->response->body(json_encode($data));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
    }

	//Connexion à l'administration
	public function admin_login(){
		$this->Session->delete('Message.flash');
        if ($this->request->is('post')) {
                if($this->Auth->login()) {
                    $this->User->id = $this->Session->read('Auth.User.id');
                    return $this->redirect(array('controller'=> 'infos','action' => 'index', 'admin'=>true));
                } else {
                    $this->Session->setFlash('Veuillez vérifier vos données !');
                }
            }
	}
	//Déconnexion retour côté client
    public function admin_logout(){
        $this->User->id = $this->Session->read('Auth.User.id');
        $this->Auth->logout();
        $this->Session->delete('Message.flash');
        return $this->redirect(array('controller'=> '../about','action' => 'index'));
    }

    //Edit identifiants connexion
    public function admin_account(){
    	$this->Session->delete('Message.flash');
        if($this->request->is('post')){
            $this->User->id = $this->Session->read('Auth.User.id');
            if(empty($this->request->data['password'])){
                if ($this->User->saveField('username', $this->request->data['username']) && $this->User->saveField('mail', $this->request->data['mail'])){
                    $this->Session->write('Auth.User.username', $this->request->data['username']);
                    $this->Session->setFlash(__('Modification réussi'));
                } else {
                    $this->Session->setFlash(__('Echec de modification'));
                }
            }
            else{
                if ($this->User->save($this->request->data)){
                    $this->Session->write('Auth.User.username', $this->request->data['username']);
                    $this->Session->setFlash(__('Modification réussi'));
                } else {
                    $this->Session->setFlash(__('Echec de modification'));
                } 
            }
        }
    }

    //Edit informations basique (ville,nom, etc...)
    public function admin_bio(){
    	$this->Session->delete('Message.flash');
    	$this->loadModel('Bio');
    	$this->Bio->id = 5;
    	$res = $this->Bio->find('first');
    	$this->set('bio', $res);

        if($this->request->is('post')){
			  $photo = $_FILES['photo'];
			  $cv = $_FILES['cv'];

			  //Upload photo
			  if ($photo['error'] === UPLOAD_ERR_OK) {
			    $id = String::uuid();
			    if (move_uploaded_file($photo['tmp_name'], APP.'webroot/uploads'.DS.$id)) {
					$this->Bio->saveField('photo', $id);
			    }
			  }

			  //Upload cv
			  if ($cv['error'] === UPLOAD_ERR_OK) {
			    $id = String::uuid();
			    if (move_uploaded_file($cv['tmp_name'], APP.'webroot/uploads'.DS.$id)) {
					$this->Bio->saveField('cv_link', $id);
			    }
			  }

            	$this->User->id = $this->Session->read('Auth.User.id');
                if ($this->Bio->save($this->request->data)){
                    $this->Session->setFlash(__('Modification r&eacute;ussi'));
                } else {
                    $this->Session->setFlash(__('Echec de modification'));
                } 
        }
    }

    //Edit liens vers réseaux sociaux
    public function admin_socials(){
        $this->Session->delete('Message.flash');
        $this->loadModel('Social');

        if($this->request->is('post')){
                $icon = $_FILES['icon'];

                //Upload photo
                    if ($icon['error'] === UPLOAD_ERR_OK) {
                        $id = String::uuid();
                        if (move_uploaded_file($icon['tmp_name'], APP.'webroot/uploads'.DS.$id)) {
                            
                        }
                }
                if ($this->Social->save($this->request->data, $this->Social->saveField('icon', DS.$id))){
                    $this->Session->setFlash(__('Ajout r&eacute;ussi'));
                } else {
                    $this->Session->setFlash(__('Echec ajout'));
                } 
        } 
    }

    //Suppression social link
    public function admin_delSOC(){
        $this->autoRender=false;
        $this->Session->delete('Message.flash');
        $this->loadModel('Social');
        $this->Social->delete($this->request->params['pass'][0]);

        $this->Session->setFlash(__('Ajout r&eacute;ussi'));
        
        return $this->redirect(array('controller'=> 'users','action' => 'socials', 'admin'=>true));
    }

    //Récup liens réseaux sociaux en ajax
    public function admin_fetchSOC(){
        $this->layout = null ;
        $this->autoRender=false;
        $this->loadModel('socials');

        $links = $this->socials->find('all');
            $this->response->body(json_encode($links));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
    }

    //Récup langages en ajax
    public function admin_fetchSkill(){
        $this->layout = null ;
        $this->autoRender=false;
        $this->loadModel('Skill');

        $links = $this->Skill->find('all');
            $this->response->body(json_encode($links));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
    }

    //Edit skills
    public function admin_skills(){
        $this->Session->delete('Message.flash');
        $this->loadModel('Skill');
        if($this->request->is('post')){
                if ($this->Skill->save($this->request->data)){
                    $this->Session->setFlash(__('Ajout réussi'));
                } else {
                    $this->Session->setFlash(__('Echec ajout'));
                } 
        }     
    }

    //Suppression skill
    public function admin_delSkl(){
        $this->autoRender=false;
        $this->Session->delete('Message.flash');
        $this->loadModel('Skill');
        $this->Skill->delete($this->request->params['pass'][0]);

        $this->Session->setFlash(__('Suppression r&eacute;ussi'));
        
        return $this->redirect(array('controller'=> 'users','action' => 'skills', 'admin'=>true));
    }
}