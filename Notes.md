###CRUD Operations
#1. Create - Insertion into database
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
