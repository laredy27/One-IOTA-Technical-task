<?php

namespace app\controller;

use core\Response;

class ProductsController extends AppController
{
	public function all()
	{
		$mapper = $this->mappers->load('Product');

		$products = $mapper->all();

		$content = $this->view->render('products/list', array('products' => $products));
		$content = $this->standardPage($content);

		$response = new Response();
		$response->ok($content);

		return $response;
	}
                
        public function item( $id ){
            $mapper = $this->mappers->load('Product'); // Load the products mapper(model);
            $product = $mapper->find( $id ); // Get a product from the model using it's id
            
            # Check to see if the product was found, if not report this 
            if(!is_null($product) ){
                $content = $this->view->render( 'products/item-detail', array( 'product' => $product ) );
                
            }else{
                $content = "That product does not exist or was not found"; //or use a view
            }
            $content = $this->standardPage($content);
            
            $response = new Response();
            $response->ok( $content );
            return $response;
        }
}
