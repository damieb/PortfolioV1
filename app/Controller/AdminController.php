<?php
class AdminController extends AppController {
	public function index(){
		return $this->redirect(array('controller'=> 'users','action' => 'login', 'admin'=>true));
	}
}