
//$(document).ready(function(){
$("#pwd").keyup(function(){
		var pwd = $("#pwd").val();
		if (pwd == ''){
		$("#chkpwd").html("");}
		else{
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{pwd:pwd},
			success: function(resp){

				if (resp == 'false'){
					$("#chkpwd").html("<font color='brown'>Current Password is wrong!</font>");	
				}
				else{
					$("#chkpwd").html("<font color='green'>Current Password is right!</font>");	
				}
			},
			error:function(resp){
				
				alert("Error");
			}
		});}
	});
	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel');
		var deletefunc = $(this).attr('rel1');
		if (deletefunc == "deleteproduct"){
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this file!",
			type: "warning",
			showCancelButton:true,
			confirmButtonClass:"btn-danger",
			confirmButtonText:"Yes,Delete it!",
		  },
		  function(){
			  window.location.href="/admin/"+deletefunc+"/"+id;
		  });}
		  else if (deletefunc == "deletecategory"){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this file!",
				type: "warning",
				showCancelButton:true,
				confirmButtonClass:"btn-danger",
				confirmButtonText:"Yes,Delete it!",
			  },
			  function(){
				  window.location.href="/admin/"+deletefunc+"/"+id;
			  });}
			  else if (deletefunc == "deleteattribute"){
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this file!",
					type: "warning",
					showCancelButton:true,
					confirmButtonClass:"btn-danger",
					confirmButtonText:"Yes,Delete it!",
				  },
				  function(){
					  window.location.href="/admin/"+deletefunc+"/"+id;
				  });}
	});
	


	
	//$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#add_category_validate").validate({
		rules:{
			categoryname:{
				required: true,
				
			},
			description:{
				required:true,
				
			},
			url:{
				required:true,
				
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#add_product_validate").validate({
		rules:{
			productname:{required: true},
			description:{required:true},
			url:{required:true},
			parentId:{required:true},	
			fileinput:{required:true},
			price:{required:true,number:true},
			color:{required:true},
			code:{required:true},	
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd1:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd1"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	//$("#addbtn").click(function(){
		var maxField = 10; //Input fields increment limitation
		 var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper"><div class="controls"><input type="text" name="sku[]" id="sku" value="" placeholder="SKU" style="width:130px"/> <a href="javascript:void(0);" class="remove_button"><strong> X</a><br> <select name="size[]" id="size" style="width:145px"><option value="Small"><strong>Small</option><option value="Medium"><strong>Medium</option><option value="Large"><strong>Large</option><option value="Xlarge"><strong>XLarge</option></select><br> <input type="text" name="stock[]" id="stock" value="" placeholder="Stock" style="width:130px"/><br> <input type="text" name="price[]" id="price" value="" placeholder="Price" style="width:130px"/></div></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	//});

//});
