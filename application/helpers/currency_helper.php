<?php

function get_currency_symbol()
  {
    //the database functions can not be called from within the helper
    //so we have to explicitly load the functions we need in to an object
    //that I will call ci. then we use that to access the regular stuff.
    $ci=& get_instance();
    $ci->load->database();
    
    //select the required fields from the database
    $ci->db->select('currency_symbol');
    
    //tell the db class the criteria
    $ci->db->where('invoice_id', 1);
    
    //supply the table name and get the data
    $query = $ci->db->get('invoice');
    
    foreach($query->result() as $row):
 
        //get the full name by concatinating the first and last names
        $currencySymbol = $row->currency_symbol;
 
    endforeach;
    
    return $currencySymbol;
  }

//convert numbers to currency format
if ( ! function_exists('currency_format'))
{
  function currency_format($number)
  {
    $currencySymbol = get_currency_symbol();
    return $currencySymbol. number_format($number, 2, '.', ',');
  }
}
 
?>
