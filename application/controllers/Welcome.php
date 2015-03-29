<?php

/**
 * Our homepage. Show the most recently added quote.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct()
    {
	parent::__construct();
    }

    //-------------------------------------------------------------
    //  Homepage: show a list of the orders on file
    //-------------------------------------------------------------

    function index()
    {
	// Build a list of orders
        $this->load->helper('directory');
        $list = directory_map('./data/', 1);
        
        $this->data['test'] = '';
       
        $orders[] = array();
        
        for($i = 0; $i < count($list); $i++){
            if(strcmp(substr($list[$i], -4), '.xml') == 0)
                    if(strcmp(substr($list[$i], 0, 5), 'order') == 0)
                            $this->data['test'] .= $this->createOrderLink($list[$i]);
        }        
        
	// Present the list to choose from
	$this->data['pagebody'] = 'homepage';
	$this->render();
    }
    
    // Creates a clickable order link
    function createOrderLink($filename){
        $name = substr($filename, 0, -4);
        $order = '';
        
        $order = '<a href="order/' . $name . '">' . $name . '</a><br/>';
        
        return $order;
    }
    
    //-------------------------------------------------------------
    //  Show the "receipt" for a specific order
    //-------------------------------------------------------------

    function order($filename)
    {
	// Build a receipt for the chosen order
	
	// Present the list to choose from
	$this->data['pagebody'] = 'justone';
	$this->render();
    }
    

}
