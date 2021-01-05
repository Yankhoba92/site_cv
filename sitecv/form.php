<?php
 
 class Form{

	private $data;
	function __construct($data = array()){
		$this->data = $data;
	}

	public function input($name){
		echo '<div class="md-form mb-0">
				<input type="text" id="name" name="name" class="form-control"placeholder="Name" >
				<label for="name">Name</label>
			 </div>';
	}

	public function mail($email){
		echo '<div class="md-form mb-0">
                <input type="text" id="email" name="email" class="form-control" placeholder="yourmail@gmail.com">
                <label for="email">Email</label>
              </div>';
	}

	public function sujet($subject){
		echo '<div class="md-form mb-0">
				<input type="text" id="subject" name="subject" class="form-control" placeholder="Sujet">
				<label for="subject" >Sujet</label>
			  </div>';
	}

	public function text($textarea){
		echo '<div class="md-form">
				<textarea id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
				<label for="message" placeholder="Description">Description</label>
			 </div>';
	}

	public function submit(){
		echo '<div class="text-center text-md-left">
				<button class=" btn btn-primary">Envoyer</button>
			 </div>';
	}

}	