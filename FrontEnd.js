//<!---------------------------------------------------------JavaScript------------------------------------------------------------------------->
{/* <script> */}
//------------Add Advocate Data-------------
	function saveadv(){
		var advname= $("#advname").val();
		var advcontact= $("#advcontact").val();
		
		$.ajax({   
		type: "POST",
		url: "<?php echo base_url('Test/saveadv'); ?>", 
		data:{
			advname: advname,
			advcontact: advcontact
			},
			success:function(msg){  
			alert(msg);
			}  
		});
	}
	
{/* </script>  */}

{/* <script>  */}

//----------------Search Advocate Data-------
searchAdvocate()

var base_url = '<?php echo base_url(); ?>';

	function searchAdvocate() {
		var adv_name = $('#adv_name').val();
		var adv_contact = $('#adv_contact').val();
		$.ajax({
			type: "POST",
			url: base_url + "Test/searchAdvocate",
			data: {
				adv_name: adv_name,
				adv_contact: adv_contact,
			},
			success: function (msg) {
				$("#advdata").html(msg);
			}
		});
	}

// -----------------Show Advocate Data---------
	function getdatabyid(id){
		$.ajax({
			type: "POST",
			url: base_url + "Test/editAdvocateData",
			data: { id: id },
			success: function (msg) {
				console.log(msg)
			let obj = 	JSON.parse(msg);
				console.log(obj)
				
				$('#edit_name').val(obj.adv_name)
				$('#edit_contact').val(obj.adv_contact)
				$('#adv_id').val(obj.adv_id)
			}
		});
	}
	
//----------------Edit Advocate Data---------------	
	function editdata(){
	var adv_id = $('#adv_id').val();
	var edit_name=$("#edit_name").val();
	var edit_contact=$("#edit_contact").val();
	
		$.ajax({   
		type: "POST",  
		url: "<?php echo base_url('Test/editdata'); ?>",  
		data:{
			adv_id:adv_id,
			edit_name:edit_name,
			edit_contact:edit_contact
		},
		success: function(msg){ 
			alert(msg);
		location.reload();
		}
	 
		});
	}
	
//---------------Delete Advocate Data----------	
	function getdata(id){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Test/deleteData')?>" ,
			data: { 
				id: id,
			},
			success: function (msg) {
			confirm(msg);
			location.reload();
			}
		});
	}
	
{/* </script> */}
