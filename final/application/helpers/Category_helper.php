	
    <?php
    public function listObjectByCategory($id){
		$allCat = array();
		$allCat['cat'] = $this->Category->getObjWithCategory($id);
		$this->load->view('Header');
		$this->listCategory();
		$this->load->view('list', $allCat);
		$this->load->view('Footer');
	}