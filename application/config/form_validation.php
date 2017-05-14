<?php 



$config = [

		'login_form_validation'=>[

							[
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email'
        
							],
							[
							
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required'
        
							]

		],

		'category_form_validation'=>[

							[
							'field' => 'name',
							'label' => 'name',
							'rules' => 'required'
        
							],
							[
							'field' => 'parent_id',
							'label' => 'parent',
							'rules' => 'required|is_natural'
        
							],
							[
							'field' => 'description',
							'label' => 'Category description',
							'rules' => ''
							]
							

		],

		'product_upload_validation'=>[

							[
							'field' => 'title',
							'label' => 'name',
							'rules' => 'required|min_length[2]'
        
							],
							[
							'field' => 'description',
							'label' => 'Product Description',
							'rules' => ''
        
							],
							[
							'field' => 'thumbnail',
							'label' => 'Product images',
							'rules' => ''
        
							],
							[
							'field' => 'price',
							'label' => 'Product Price',
							'rules' => 'required|is_natural'
        
							],
							[
							'field' => 'quantity',
							'label' => 'Product quantity',
							'rules' => 'required|is_natural'
        
							],
							[
							'field' => 'compare_price',
							'label' => 'Compare price',
							'rules' => 'is_natural'
        
							],
							[
							'field' => 'sku',
							'label' => 'SKU',
							'rules' => ''
        
							],
							[
							'field' => 'shipping',
							'label' => 'Shipping cost',
							'rules' => 'is_natural'
        
							],
							[
							'field' => 'status',	
							'label' => 'Product Status',	
							'rules' => 'required|is_natural'	
							],
							[
							'field' => 'category',
							'label' => 'Category',
							'rules' => 'required|is_natural_no_zero'
 							],
 							[
 							'field' => 'shipping',
 							'label' => 'shipping cost',
 							'rules' => 'is_natural'
 							] 

		]
];