<?php
class ContactController extends AppController {
	public function index(){
		$this->Session->delete('Message.flash');
        if($this->request->is('post')){
            $this->Contact->id = $this->Session->read('Auth.Contact.id');
                if ($this->request->data['result'] != $this->Session->read('Captcha')){
                    $this->Session->setFlash(__('Echec envoi'));
                } else {
                    $this->Contact->save($this->request->data);
                    $this->Session->setFlash(__('Message envoy&eacute'));
                }
        }
	}

    private function captchaMath()
    {
        $this->layout = null ;
        $this->autoRender=false;

        $n1 = mt_rand(0,9);
        $n2 = mt_rand(0,9);
        $nbrFr = array('0','1','2','3','4','5','6','7','8','9');
        $resultat = $n1 + $n2;
        $phrase = $nbrFr[$n1] .' + '.$nbrFr[$n2];
        
        return array($resultat, $phrase);   
    }

    public function captcha()
    {
        $this->layout = null ;
        $this->autoRender=false;

        list($resultat, $phrase) = $this->captchaMath();
        $this->Session->write('Captcha', $resultat);

            $this->response->body(json_encode($phrase));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
    }

    public function checkCaptcha(){
        $this->layout = null ;
        $this->autoRender=false;

        if($this->request->data['res'] != $this->Session->read('Captcha')){
            $valid = 'fail';
        }
        else{
            $valid = 'good';
        }

            $this->response->body(json_encode($valid));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
    }
}