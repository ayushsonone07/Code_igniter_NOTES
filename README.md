# CURD Operations
 # 1. Create - Insertion into database
 FrontEnd
```
<!-----------------Add Advocate Model-------------------->
<div id="portlet-config" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Add  Advocate Name</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body" >
                 <div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>Advocate Name</label>
							<input type="text" id="advname" name='advname'  class="form-control" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Contact</label>
							<input type="text" id="advcontact" name='advcontact'  class="form-control" />				         
						</div>
					</div>
				  </div><hr>
				  <div class="form-actions pull-right">
				     <button type="submit" name='discount' value='discount' data-dismiss="modal" onclick="saveadv();" class="btn btn-info">Save</button>
				     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				  </div>
             </div>
         </div>
	</div>
</div>
```
BackEnd
```
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
```
 # 2. Update - Updation of Data into database
FrontEnd
```
<!-----------------Edit Advocate Model-------------------->
<div id="editmyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Edit Advocate Name</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body" id="edit_advocate">
             	<input type="hidden" name="adv_id" id="adv_id" >
                 <div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>Advocate Name</label>
							<input type="text" id="edit_name" name='edit_name' class="form-control"/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Contact</label>
							<input type="text" id="edit_contact" name='edit_contact'  class="form-control" />
				         </div>
					</div>
				  </div>
				  <hr>
				  <div class="form-actions pull-right">
				      <button type="button" name='discount' value='discount' onclick="editdata();" data-dismiss="modal" class="btn btn-warning">Update</button>
				      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				  </div>
             </div>
         </div>
	</div>
</div>
```
BackEnd
```
1. At First
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

2. Then show data

public function editAdvocateData(){
    	$adv_id = $_POST['id'];
    	$data = $this->Common_model->find_query("SELECT * FROM `advocate_mst` WHERE adv_id = $adv_id");
		echo json_encode($data[0]);
	}

3. Then edit data
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
	
```
# 3. Read - Seraching into database
FrontEnd
```
<div id="main-wrapper">
	<div class="page-wrapper bg">
		<div class="container-fluid p-l-20">
			<div class="row">
				<div class="col-md-12">
					<div class="card space">
						<h4 class="new_title">Manage Advocate</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="row p-l-25 p-r-15 p-b-15">
					
								<div class="col-md-2">
									<input type="text" id="adv_name" name="adv_name" class="form-control"
										placeholder="Search by Advocate Name" />
								</div>
								<div class="col-md-2">
									<input type="text" id="adv_contact" name="adv_contact" class="form-control"
										placeholder="Search by Advocate Contact" />
								</div>
								<div class="col-md-4">
									<span>
										<button type="button" class="btn btn-success"
											onclick="searchAdvocate();">Search</button>
									</span>
									<span>
										<a href="#portlet-config" data-toggle="modal">
											<button type="submit" onclick="" class="btn btn-danger">&nbsp; <i class="icon-plus"></i>Add Advocate </button>
										</a>
									</span>
								</div>
							</div>
							
<!-----------------------------------------Table-------------------------------------->
							<div class="general-container p-l-5 p-r-5 p-b-10">
								<div class="table-container" style="max-height:450px">
									<table>
										<thead >
											<tr>
												<th style="width:10px">Sl.N.</th>
												<th style="width:10px;">Advocate Name </th>
												<th style="width:10px;">Contact</th>
												<th style="width:10px;">Entry Date</th>
												<th style="width:10px;">Update</th>
												<th style="width:10px;">Delete</th>
											</tr>
										</thead>
										
										<!--Table Data-->
										<tbody id="advdata"> 
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
```
BackEnd
```
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
```
 # 4. Delete - Delete a data into database
FrontEnd
```
<td><center><a onclick="getdata('<?php echo $row['adv_id'];?>')" style="color:white;" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-sm">Delete</a></td>
```
BackEnd
```
	// -------Delete Advocate Data -----------------------
	public function deleteData(){
		$adv_id = $_POST['id'];
		$data['adv_status'] = 0;
		echo "Delete record";
	    $this->Crud_model->edit_record_by_any_id("advocate_mst","adv_id", $adv_id,$data);
	}
```
