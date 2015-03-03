<?php
class WorkController extends AppController {
	public function index(){
		$this->loadModel('Work');
		$work = $this->Work->find('all');

		$this->set('works', $work);
	}

	public function fetchWork(){
        $this->layout = null ;
        $this->autoRender=false;
        $this->loadModel('Work');

        	$work = $this->Work->find('first', array('conditions' => array('id' => $this->request->data['id'])));
        	$langage = explode(';', $work['Work']['langage']);

            $this->response->body(json_encode(array('info' => $work, 'langage' => $langage)));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
	}
}