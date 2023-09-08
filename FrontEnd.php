<link rel="stylesheet" href="<?php echo base_url().'my-assets/tree/build/build.css'; ?>">
<link rel="stylesheet" href="<?php echo base_url().'my-assets/tree/index.css'; ?>">
<style>
	.input-container {
		display: -ms-flexbox;
		/* IE10 */
		display: flex;
		width: 100%;
		margin-bottom: 15px;
	}

	.icon {
		padding: 10px;
		background: dodgerblue;
		color: white;
		min-width: 50px;
		text-align: center;
	}

	.input-field {
		width: 100%;
		padding: 10px;
		outline: none;
	}

	.input-field:focus {
		border: 2px solid dodgerblue;
	}

	.red {
		color: red;
	}
	
	.card {
        box-shadow: 0px 0 11px 0.5px;
    }
</style>
<!---------------------------------------------------Start Model------------------------------------------------------------------------>

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

<!------------------------------------------------------ End model -------------------------------------------------------------------->
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
