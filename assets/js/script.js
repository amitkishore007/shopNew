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

		var cat_name = $('.cat_name').val();
		var parent_id = $('.parent_cat').val();
		var cat_desc = $('.cat_desc').val();

	    $('.error').html('');
		

		console.log(cat_name+" "+parent_id+" "+cat_desc);
		

		$.ajax({

			url : ajax_url+"admin/store_category",
			
			type: 'POST',
			
			data : {'category':'category',name:cat_name,parent_id:parent_id,description:cat_desc},
			
			beforeSend :  function(){
				$('.form-loader').show();
				$('.create-cat').attr('disabled','disabled');

			},

			success :function(html) {

				// console.log(html);
				$('.create-cat').removeAttr('disabled');
				$('.form-loader').hide();

				var data = JSON.parse(html);

				if (data.status=='false') {

					$('.name-error').html(data.name);
					$('.cat-error').html(data.parent);
					$('.desc-error').html(data.desc);
					
				} else {

					$('.card-heading .card-title').after('<h2 class="text-center success-msg alert alert-success">Successfully created category</h2>');
					$('.cat_name').val('');
					$('.cat_desc').val('');
					$('.success-msg').fadeOut(5000)

					window.location = ajax_url+'admin/';

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
		
		var product_name      = $('.product_name     ').val();
		var product_desc      = $('#add_product_desc ').val();
		var product_price     = $('.product_price    ').val();
		var product_compare   = $('.product_compare  ').val();
		var product_status    = $('.product_status   ').val();
		var product_sku       = $('.product_sku      ').val();
		var product_shipping  = $('.product_shipping ').val();
		var product_quantity  = $('.product_quantity ').val();
		var product_cat  	  = $('.product_cat ').val();
		
		// console.log(product_name+" "+product_desc+" "+product_price+" "+product_compare+" "+product_status+" "+product_sku +" "+product_barcode+" "+product_inventory+" "+product_width+" "+product_height+" "+product_depth+" "+product_weight+" "+product_unit+" "+product_shipping );

		

		$.ajax({

			url: ajax_url+"admin/add_product",
			
			type: "POST",
			
			data: {
					'add_product':'add_product',
					title : product_name,     
					description : product_desc ,
					price : product_price,
					compare_price : product_compare,
					status : product_statu,
					sku : product_sku ,
					shipping : product_shipping,
					quantity : product_quantity	
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

});