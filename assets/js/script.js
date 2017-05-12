$('document').ready(function(){



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
					
				} else {
					
					$('.cat_name').val('');
					$('.parent_cat').val('');
					$('.cat_desc').summernote('code','');
				
					$('.success-msg').html('Successfully created category');
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
		
		var product_price      = $('.product_price    ').val();
		var product_status     = $('.product_status   ').val();
		var product_sku        = $('.product_sku      ').val();
		var product_shipping   = $('.product_shipping ').val();
		var product_quantity   = $('.product_quantity ').val();
		var product_cat        = $('.product_cat ').val();
		var product_thumb      = $('.thumbnail').val();
		
		console.log(product_name+" "+product_desc+" "+product_price+" "+product_status+" "+product_sku+""+product_quantity+" "+product_shipping );

		

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
					thumbnail 	 : product_thumb	
				},
			
			beforeSend :function(){

				$('.form-loader').show();
			},
			success :function(html) {

				$('.form-loader').hide();

				console.log(html);


			}


		});



		return false;
	});



	$('document').on('change', '#file', function () {

		var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');


		$('#product_image').ajaxForm({
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
		    // obj = $.parseJSON(html);  
		    // if(obj.status){   
		    //   var percentVal = '100%';
		    //   bar.width(percentVal)
		    //   percent.html(percentVal);
		    //   $('#image_upload_form').fadeOut();
		    //   $('.progressBar').fadeOut();
		    //   $('#image').val(obj.image_medium);
		    //   $(".imgArea>img").prop('src',obj.image_medium);     
		    //   $('.imgArea').fadeIn();
		    // }else{
		    //   alert(obj.error);
		    // }
		    },
		  complete: function(xhr) {
		    progressBar.fadeOut();      
		  } 
		}).submit();    

	});

});