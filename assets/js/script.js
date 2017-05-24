$('document').ready(function(){


	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "1000",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	};

	$(".login-btn").on('click',function(e){

		e.preventDefault();
		var email    = $('.email').val();
		var password = $('.password').val();
		$('.error-msg').hide();
		

		$.ajax({

			url : ajax_url+"admin_login/login",
			type: 'POST',
			data : {'login':'login',email:email,password:password},
			beforeSend :  function(){
				$('.login-loader').show();

			},

			success :function(html) {

				console.log(html);
				var data = JSON.parse(html);

				if (data.status=='false') {

					$('.error').html(data.msg);
					$('.error-msg').show();


				} else {

					//console.log('successfully login');

					window.location = ajax_url+'admin/';
				}

				$('.login-loader').hide();
			}


		});

	});



	$('.create-cat').on('click',function(e){

		// e.preventDefault();

		var cat_name  = $('.cat_name').val();
		var parent_id = $('.parent_cat').val();
		var cat_desc  = $('.cat_desc').summernote('code');


	    // $('.error').html('');

	    $('.cat_name-error').html('');
		$('.parent_cat-error').html('');
		$('.cat_desc-error').html('');

		

		console.log(cat_name+" "+parent_id+" "+cat_desc);
		

		$.ajax({

			url : ajax_url+"category/store_category",
			
			type: 'POST',
			
			data : {'category':'category',name:cat_name,parent_id:parent_id,description:cat_desc},
			
			beforeSend :  function(){
				// $('.form-loader').show();
				// $('.create-cat').attr('disabled','disabled');

			},

			success :function(html) {

				// console.log(html);
				// $('.create-cat').removeAttr('disabled');
				// $('.form-loader').hide();

				var data = JSON.parse(html);

				if (data.status=='false') {

					$('.cat_name-error').html(data.name);
					$('.parent_cat-error').html(data.parent);
					$('.cat_desc-error').html(data.desc);
					toastr['error']('There was an error, try later','Error');
					
				} else {
					
					$('.cat_name').val('');
					$('.parent_cat').val('');
					$('.cat_desc').summernote('code','');
					
					toastr['success']('successfully created category','success');
					$('.success-msg').html('Successfully created category');
					$('.success-msg').show()
					$('.success-msg').fadeOut(8000)

					
				}
				
			}


		});
	});


	$('.edit-cat').on('click',function(e){

		e.preventDefault();

		var cat_id    = $(this).attr('data-catId');
		var cat_name  = $('.cat_name').val();
		var parent_id = $('.parent_cat').val();
		var cat_desc  = $('.cat_desc').summernote('code');


	    $('.cat_name-error').html('');
		$('.parent_cat-error').html('');
		$('.cat_desc-error').html('');

		

		console.log(cat_id+" "+cat_name+" "+parent_id+" "+cat_desc);
		

		$.ajax({

			url : ajax_url+"category/edit_category",
			
			type: 'POST',
			
			data : {'category':'category',cat_id:cat_id,name:cat_name,parent_id:parent_id,description:cat_desc},
			
		
			success :function(html) {

				var data = JSON.parse(html);

				console.log(html);

				if (data.status=='false') {

					$('.cat_name-error').html(data.name);
					$('.parent_cat-error').html(data.parent);
					$('.cat_desc-error').html(data.desc);
					toastr['error']('There was an error','Error');
					
				} else {
					
					toastr['success']('successfully updated category','success');
					$('.success-msg').html('Successfully updated category');
					$('.success-msg').show()
					$('.success-msg').fadeOut(8000)

					
				}
				
			}


		});
	});



	// Dropzone.options.myAwesomeDropzone = {
	//   paramName: "file", // The name that will be used to transfer the file
	//   maxFilesize: 5, // MB
	//   accept: function(file, done) {
	  
	// 	done();
	//   }
	// };


	$('.add_product').on('click',function(e){

		e.preventDefault();
		
		var product_name       = $('.product_name     ').val();
		var product_desc       = $('.add_product_desc').summernote('code');
		var product_price      = parseFloat($('.product_price    ').val());
		var product_status     = parseInt($('.product_status   ').val());
		var product_sku        = $('.product_sku      ').val();
		var product_shipping   = parseFloat($('.product_shipping ').val());
		var product_quantity   = parseInt($('.product_qty ').val());
		var product_cat        = parseInt($('.product_cat ').val());
		var product_thumb      = $('.thumbnail').val();
		
		// console.log(product_name+" "+product_desc+" "+product_price+" "+product_status+" "+product_sku+" "+product_quantity+" "+product_shipping +" "+product_thumb+" "+product_cat);

		

		$.ajax({

			url: ajax_url+"product/add_product",
			
			type: "POST",
			
			data: {
					'add_product':'add_product',
					title 		 : product_name,     
					description  : product_desc ,
					price 		 : product_price,
					status 		 : product_status,
					sku 		 : product_sku ,
					shipping 	 : product_shipping,
					quantity 	 : product_quantity,
					thumbnail 	 : product_thumb,
					category_id  : product_cat	
				},
			
			beforeSend :function(){

				$('.form-loader').show();
			},
			success :function(html) {

				$('.form-loader').hide();

				var data  = $.parseJSON(html);
				console.log(data);

				if (data.status=='false') {

					$('.name-error').html(data.product_name);
					$('.desc-error').html(data.product_desc);
					$('.category-error').html(data.category);
					$('.sku-error').html(data.product_sku);
					$('.qty-error').html(data.product_qty);
					$('.price-error').html(data.product_price);
					$('.shipping-error').html(data.product_shipping);
					$('.image-error').html(data.product_thumb);
					$('.status-error').html(data.product_status);
					toastr['error']('Error occured !','');

				
				} else {

					toastr['success']('successfully added new product','success');
					$('.product-msg').show();
					$('.add_product').attr('disabled','disabled');					
					
				}


			}


		});



		return false;
	});

$('.edit_product').on('click',function(e){

		e.preventDefault();
		
		var product_id         = $(this).attr('data-productId');
		var product_name       = $('.product_name     ').val();
		var product_desc       = $('.add_product_desc').summernote('code');
		var product_price      = parseFloat($('.product_price    ').val());
		var product_status     = parseInt($('.product_status   ').val());
		var product_sku        = $('.product_sku      ').val();
		var product_shipping   = parseFloat($('.product_shipping ').val());
		var product_quantity   = parseInt($('.product_qty ').val());
		var product_cat        = parseInt($('.product_cat ').val());
		var product_thumb      = $('.thumbnail').val();
		
		// console.log(product_name+" "+product_desc+" "+product_price+" "+product_status+" "+product_sku+" "+product_quantity+" "+product_shipping +" "+product_thumb+" "+product_cat);

		

		$.ajax({

			url: ajax_url+"product/edit_product",
			
			type: "POST",
			
			data: {
					'edit_product':'edit_product',
					product_id   : product_id,
					title 		 : product_name,     
					description  : product_desc ,
					price 		 : product_price,
					status 		 : product_status,
					sku 		 : product_sku ,
					shipping 	 : product_shipping,
					quantity 	 : product_quantity,
					thumbnail 	 : product_thumb,
					category_id  : product_cat	
				},
			
			beforeSend :function(){

				$('.form-loader').show();
			},
			success :function(html) {

				$('.form-loader').hide();

				console.log(html);
				var data  = $.parseJSON(html);

				if (data.status=='false') {

					$('.name-error').html(data.product_name);
					$('.desc-error').html(data.product_desc);
					$('.category-error').html(data.category);
					$('.sku-error').html(data.product_sku);
					$('.qty-error').html(data.product_qty);
					$('.price-error').html(data.product_price);
					$('.shipping-error').html(data.product_shipping);
					$('.image-error').html(data.product_thumb);
					$('.status-error').html(data.product_status);

					toastr['error']('Error occured','');
				
				} else {

					toastr['success']('successfully updated product','success');
					$('.product-msg').show();
					$('.edit_product').attr('disabled','disabled');					
					
				}


			}


		});



		return false;
	});



	$(document).on('change', 'form#product_image #file', function (e) {

		var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');


		$('form#product_image').ajaxForm({
		    beforeSend: function() {
		        progressBar.fadeIn();
		        var percentVal = '0%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },
		    uploadProgress: function(event, position, total, percentComplete) {
		        var percentVal = percentComplete + '%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },

		    success: function(html, statusText, xhr, $form) {   
		
			console.log(html);
		    obj = $.parseJSON(html);  
		    if(obj.status){   
		      var percentVal = '100%';
		      bar.width(percentVal)
		      percent.html(percentVal);
		      $('#product_image').fadeOut();
		      $('.progressBar').fadeOut();
		      $('.thumbnail').val(obj.name);
		      $(".uploaded_image").prop('src',ajax_url+'uploads/'+obj.name);     
		    
		    }else{
		    	toastr['error'](obj.error,'Error');
		      // alert(obj.error);
		    }
		    },
		  complete: function(xhr) {
		    progressBar.fadeOut();      
		  } 
		}).submit();    

	});



$(".delete-product").on("confirmed.bs.confirmation",function(){


	var product_id = $(this).attr('data-productId');

	$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

	$.ajax({

		url  : ajax_url+"product/delete",
		type : 'POST',
		data : {'delete':'DELETE',product_id:product_id},
		
		success : function(html){

			console.log(html);
			var data = $.parseJSON(html);

			if (data.status=='true') {

				toastr['success']('Successfully deleted product ','success');

				$('tr#row_'+product_id).fadeOut();

			
			} else {
				toastr['error']('Error occured, try later','');

				$('.ajax-loader').hide();

			}
		}

	});

});





$(".delete-category").on("click",function(){


	var cat_id = $(this).attr('data-id');

	$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

	$.ajax({

		url  : ajax_url+"category/delete",
		type : 'POST',
		data : {'delete':'DELETE',category_id:cat_id},
		
		success : function(html){

			console.log(html);
			var data = $.parseJSON(html);

			if (data.status=='true') {

				toastr['success']('Successfully deleted category ','success');

				$('#row_'+cat_id).fadeOut();

			
			} else {

				toastr['error']('Error occured, try later','');
				$('.ajax-loader').hide();

			}
		}

	});

	return false;

});


$('.create-vandor').on('click',function(e){

		e.preventDefault();

		var vandor_name     = $('.vandor_name').val();
		var vandor_email    = $('.vandor_email').val();
		var vandor_password = $('.vandor_password').val();
		var vandor_retype   = $('.vandor_retype').val();


	    // $('.error').html('');

		$('.vandor_name-error').html('');
		$('.vandor_email-error').html('');
		$('.vandor_password-error').html('');
		$('.vandor_retype-error').html('');

		if (vandor_password!=vandor_retype) {

			$('.vandor_retype-error').html('Password did not matched !');

			return;
		}
		

		// console.log(cat_name+" "+parent_id+" "+cat_desc);
		

		$.ajax({

			url : ajax_url+"admin/create_vandor",
			
			type: 'POST',
			
			data : {'vandor':'create',username:vandor_name,email:vandor_email,password:vandor_password},
			
			success :function(html) {

				console.log(html);
				// $('.create-cat').removeAttr('disabled');
				// $('.form-loader').hide();

				var data = JSON.parse(html);

				if (data.status=='false') {

					$('.vandor_name-error').html(data.name);
					$('.vandor_email-error').html(data.email);
					$('.vandor_password-error').html(data.password);
					toastr['error']('There was an error, try later','Error');
					
				} else {
				
					
					toastr['success']('successfully created category','success');
					$('.success-msg').html('Successfully created category');
					$('.success-msg').show();
					$('.success-msg').fadeOut(8000);
					$('.vandor_name').val('');
					$('.vandor_email').val('');
					$('.vandor_password').val('');
					$('.vandor_retype').val('');


					
				}
				
			}


		});
	});



$(".delete-vandor").on("confirmed.bs.confirmation",function(){


	var vandor_id = $(this).attr('data-vandorId');

	$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

	$.ajax({

		url  : ajax_url+"admin/delete_vandor",
		type : 'POST',
		data : {'delete':'DELETE',id:vandor_id},
		
		success : function(html){

			console.log(html);
			var data = $.parseJSON(html);

			if (data.status=='true') {

				toastr['success']('Successfully deleted vandor ','success');

				$('tr#row_'+vandor_id).fadeOut();

			
			} else {
				toastr['error']('Error occured, try later','');

				$('.ajax-loader').hide();

			}
		}

	});

});



$('.create_about').on('click',function(){

		var title  = $('.about_title').val();
	
		var content  = $('.about_content').summernote('code');


	    // $('.error').html('');

	    $('.title-error').html('');
		$('.about_content-error').html('');

		

		console.log(title+" "+content);
		

		$.ajax({

			url : ajax_url+"about/create_about",
			
			type: 'POST',
			
			data : {'about':'about',title:title,content:content},
			

			success :function(html) {

				 console.log(html);
				
				var data = JSON.parse(html);

				if (data.status=='false') {

					$('.title-error').html(data.title);
					$('.about_content-error').html(data.content);
					
					toastr['error']('There was an error, try later','Error');
					
				} else {
					
					toastr['success']('successfully created About page','success');
					$('.success-msg').html('Successfully created About page');
					$('.success-msg').show();
					$('.success-msg').fadeOut(8000);

					
				}
				
			}


		});

});


$('.edit_about').on('click',function(){

		var title  = $('.about_title').val();
	
		var content  = $('.about_content').summernote('code');

		var id = $(this).attr('data-aboutId');


	    // $('.error').html('');

	    $('.title-error').html('');
		$('.about_content-error').html('');

		

		console.log(title+" "+content);
		

		$.ajax({

			url : ajax_url+"about/store",
			
			type: 'POST',
			
			data : {'edit':'edit',title:title,content:content,id:id},
			

			success :function(html) {

				 console.log(html);
				
				var data = JSON.parse(html);

				if (data.status=='false') {

					$('.title-error').html(data.title);
					$('.about_content-error').html(data.content);
					
					toastr['error']('There was an error, try later','Error');
					
				} else {
					
					toastr['success']('successfully update About page','success');
					$('.success-msg').html('Successfully update About page');
					$('.success-msg').show();
					$('.success-msg').fadeOut(8000);

					
				}
				
			}


		});

});



$('.page_status').click(function() {
   
   if($(this).is(':checked')) { 

   	var id = $(this).attr('data-aboutId');

   	change_status_checkbox(id,ajax_url+"about/change_status",'active','successfully updated the about status','Error occured, try later');  	

   }

});



$(".delete-logo").on("confirmed.bs.confirmation",function(){


	var logo_id = $(this).attr('data-logoId');

	$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

	delete_image(slide_id,ajax_url+"logo/delete",'successfully deleted the logo','Error occured, try later');


});

$(".delete-slide").on("confirmed.bs.confirmation",function(){


	var slide_id = $(this).attr('data-slideId');

	$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

	delete_image(slide_id,ajax_url+"slider/delete",'successfully deleted the slide','Error occured, try later');


});



$('.logo_status').click(function() {
   
   if($(this).is(':checked')) { 

   	var id = $(this).attr('data-logoId');
 	
 	change_status_checkbox(id,ajax_url+"logo/change_status",'active','successfully activated the logo','Error occured, try later');  	
   

   }

});


$('.slide_status').click(function() {
   
   	var id = $(this).attr('data-slideId');
   
   if($(this).is(':checked')) { 

   	// set status = 1

   	change_status_checkbox(id,ajax_url+"slider/change_status",'active','successfully activated the slide','Error occured, try later');
  

   } else {

   	// set status = 0
	change_status_checkbox(id,ajax_url+"slider/change_status",'inactive','successfully deactivated the slide','Error occured, try later');

   }

});

$('.banner_status').click(function() {
   
   	var id = $(this).attr('data-bannerId');
   
   if($(this).is(':checked')) { 

   	// set status = 1

   	change_status_checkbox(id,ajax_url+"banner/change_status",'active','successfully activated the banner','Error occured, try later');
  

   } else {

   	// set status = 0
	change_status_checkbox(id,ajax_url+"banner/change_status",'inactive','successfully deactivated the banner','Error occured, try later');

   }

});


$(".delete-banner").on("confirmed.bs.confirmation",function(){


	var banner_id = $(this).attr('data-bannerId');

	$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

	delete_image(banner_id,ajax_url+"banner/delete",'Successfully deleted the banner','Error occured, try later');


});

	$('.banner-position').on('change',function(){

		var location = $(this).val();
		var id = $(this).attr('data-bannerId');
		$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");


		$.ajax({

	   		url : ajax_url+"banner/set_location",
	   		type :'POST',
	   		data : {'location':'change' ,location:location,id:id},

	   		success :function (html) {

	   			console.log(html);
	   			$('.ajax-loader').hide();

	   			if (html=='success') {

	   				toastr['success']('successfully updated the banner','success');

	   			} else {

	   				toastr['error']('Error occured, try later !','Error');

	   			}

	   		}
	   	});

	});




	$('.view-order').on('blur',function(){

		var banner_id = $(this).attr('data-bannerId');
		var order     = $(this).val();

	    $(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");


		
	$.ajax({

		url  : ajax_url+'banner/set_order',
		type : 'POST',
		data : {'order_view':'update',banner_id:banner_id,order:order},
		
		success : function(html){

			console.log(html);
			
			$('.ajax-loader').hide();

			if (html=='success') {

				toastr['success']('successfully updated the order','success');

		
			} else {
				toastr['error']('Error occured, try later !','Error');

				

			}
		}

	});


	});


	$('.home-category').on('change',function(){

		var type = $(this).attr('data-type');
		var number = $(this).attr('data-number');
		var cat_id = $(this).val();

		$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");



		console.log(type+" "+number+" "+cat_id);

		$.ajax({

		url  : ajax_url+"category/set_home_category",
		type : 'POST',
		data : {'home_category':'set',type:type,number:number,cat_id:cat_id},
		
		success : function(html){

			console.log(html);
			
			$('.ajax-loader').hide();

			if (html=='success') {

				toastr['success']('successfully updated category','success');
			
			} else {

				toastr['error']('successfully updated category','Error');


			}
		}

	});


	});


	$('.hot-sale').on('switchChange.bootstrapSwitch', function(e, state) { 

		var product_id = $(this).attr('data-productId');
		$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");


		if (state==true) {

			//set hot sale to 1

			change_status_checkbox(product_id,ajax_url+"product/set_hot_sale",'active','successfully added product in hot sale','Error occured')

		} else {

			// set hot sale to 0
			change_status_checkbox(product_id,ajax_url+"product/set_hot_sale",'inactive','successfully removed product from hot sale','Error occured')


		}

		$('.ajax-loader').hide();
		
	});


	$('.product-status').on('switchChange.bootstrapSwitch', function(e, state) { 

		var product_id = $(this).attr('data-productId');
		
		$(this).after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");


		if (state==true) {

			//set hot sale to 1

			change_status_checkbox(product_id,ajax_url+"product/change_status",'active','successfully updated product status','Error occured')

			$('#status_'+product_id).html('Published');
			$('#status_'+product_id).removeClass('text-danger').addClass('text-success');
		

		} else {

			// set hot sale to 0
			change_status_checkbox(product_id,ajax_url+"product/change_status",'inactive','successfully updated product status','Error occured')
			
			$('#status_'+product_id).html('Not published');
			$('#status_'+product_id).removeClass('text-success').addClass('text-danger');


		}

		$('.ajax-loader').hide();
		
	});

});


function delete_image(id,url,success='',error='') {
	$.ajax({

		url  : url,
		type : 'POST',
		data : {'delete':'DELETE',id:id},
		
		success : function(html){

			console.log(html);
			

			if (html=='success') {

				toastr['success'](success,'success');

				$('tr#row_'+id).fadeOut();

			
			} else {
				toastr['error'](error,'');

				$('.ajax-loader').hide();

			}
		}

	});
}

function change_status_checkbox(id,url,status,success='',error='') {

		$.ajax({

   		url : url,
   		type :'POST',
   		data : {'change':status ,id:id},

   		success :function (html) {

   			console.log(html);

   			if (html=='true') {

   				toastr['success'](success,'success');

   			} else {

   				toastr['error'](error,'Error');

   			}

   		}
   	});

}