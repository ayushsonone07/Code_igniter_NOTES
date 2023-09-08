<?php
class Test extends CI_Controller{

/*-------------------------------Advocate Controler----------------------------------------------------------------------------------*/   
    public function advmst(){
        if ($this->ion_auth->logged_in()){
        $this->load->view('includes/header');
        $this->load->view('includes/left_sidebar');
        $this->load->view('Test/advmst',$data);
        $this->load->view('includes/footer');
        }
        else{
        redirect('auth/login', 'refresh');
        }
    }
 
	// -------Add Advocate Data -----------------------
    public function saveadv(){
	$advname = $this->input->post('advname');
	$advcontact = $this->input->post('advcontact');
	$data['adv_name']=  $advname;
	$data['adv_contact']= $advcontact;
	$data['adv_entrydt'] = date('Y-m-d H:i:s');
	$data['adv_status'] = 1;
	$this->Crud_model->insert_record('advocate_mst',$data);
	echo "data saved successfully";
	}
	
	// -------Edit Advocate Data -----------------------
    public function editdata(){
	$adv_id= $this->input->post('adv_id');
	$edit_name = $this->input->post('edit_name');
	$edit_contact = $this->input->post('edit_contact');
	$data['adv_name']=$edit_name;
	$data['adv_contact']=$edit_contact;
	$data['adv_entrydt'] = date('Y-m-d H:i:s');
	$this->Crud_model->edit_record_by_any_id('advocate_mst','adv_id',$adv_id,$data);
	echo  "Data updated Sucessfully";
	}
	
	// -------Show Advocate Data -----------------------
    public function editAdvocateData(){
    	$adv_id = $_POST['id'];
    	$data = $this->Common_model->find_query("SELECT * FROM `advocate_mst` WHERE adv_id = $adv_id");
		echo json_encode($data[0]);
	}
	
	// -------Delete Advocate Data -----------------------
	public function deleteData(){
		$adv_id = $_POST['id'];
		$data['adv_status'] = 0;
		echo "Delete record";
	    $this->Crud_model->edit_record_by_any_id("advocate_mst","adv_id", $adv_id,$data);
	}
     
    // -------Search Advocate Data------------------------
    public function searchAdvocate()
			{
			$condition = "";
			
			if(isset($_REQUEST['adv_contact']) && $_REQUEST['adv_contact']!=""){
			$condition.=" and adv_contact like '%".$_REQUEST['adv_contact']."%'";
			}
			
			if(isset($_REQUEST['adv_name']) && $_REQUEST['adv_name']!=""){
			$condition.=" and adv_name like '%".$_REQUEST['adv_name']."%'";
			}
			
			$resultdata= $this->Common_model->find_query("SELECT * FROM `advocate_mst` where adv_status=1 $condition order by adv_name asc");
			$sl=0;
		   	foreach($resultdata as $row){
		   	$sl++;
		      ?> 
		   	<tr>
			   	<td><center><?php echo $sl; ?></td></center>
			   	<td><?php echo $row['adv_name']; ?></td> 
			   	<td><?php echo $row['adv_contact']; ?></td>
			   	<td><?php 
			   	if($row['adv_entrydt']!="0000-00-00 00:00:00"){
			   	echo date('d-m-Y',strtotime($row['adv_entrydt'])); } ?></center></td>
			   	<td><center><a href="#editmyModal" onclick="getdatabyid('<?php echo $row['adv_id'];?>')" style="color:white;" data-toggle="modal" data-target="#editmyModal" class="btn btn-info btn-sm">Edit</a></td>
			   	<td><center><a onclick="getdata('<?php echo $row['adv_id'];?>')" style="color:white;" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-sm">Delete</a></td>
		   	</tr>
		   	<?php
		   }
	}

    // -------Fetch Advocate ID ------------------------
	public function fetchdata($adv_id)
	{
		$advid = $_POST['advid'];
		$result = $this->Common_model->find_query("SELECT *  FROM `advocate_mst` WHERE `adv_id` = $advid");
		$adv_id = $result[0]['adv_id'];
		$adv_name = $result[0]['adv_name'];
		$adv_contact = $result[0]['adv_contact'];
		$json=array('adv_id' => $adv_id,'adv_name' => $adv_name,'adv_contact' => $adv_contact);
		echo json_encode($json);
	}
}