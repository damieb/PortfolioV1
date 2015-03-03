<?php
class AboutController extends AppController {
	public function index(){
		
	}

	public function fetchInfo(){
        $this->layout = null ;
        $this->autoRender=false;
        $this->loadModel('Bio');
        $this->loadModel('Social');
        $this->loadModel('Skill');

        	$info = $this->Bio->find('all');
        	$links = $this->Social->find('all');
        	$skill = $this->Skill->find('all');

        	$about = array('info' => $info, 'socials' => $links, 'skill' => $skill);
            $this->response->body(json_encode($about));
            $this->response->statusCode(200);
            $this->response->type('application/json');
             
            return $this->response;
	}
}