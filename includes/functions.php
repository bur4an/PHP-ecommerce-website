<?php  
	function get_product_name($pid){    
    	global $dbC;
		$result=mysqli_query($dbC, "select prodname from product where prodid='$pid'");
		$row=mysqli_fetch_array($result);
		return $row['prodname'];
	}
	
	function get_cust_id($username){
    	global $dbC;
		$result=mysqli_query($dbC, "select custid from login where uname='$username'");
		$row=mysqli_fetch_array($result);
		return $row['custid'];
	}
	
	function get_product_type($pid){ 
    	global $dbC;
		$result=mysqli_query($dbC, "select prodtype from product where prodid='$pid'");
		$row=mysqli_fetch_array($result);
		return $row['prodtype'];
	}
	
	function get_price($pid){
    	global $dbC;
        $result=mysqli_query($dbC, "select price from product where prodid='$pid'");
        if (!$result) {
            printf("Error: %s\n", mysqli_error($dbC));
            exit();
}
		$row=mysqli_fetch_array($result);
		return $row['price'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['name']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['name'][$i]['productid']){
				unset($_SESSION['name'][$i]);
				break;
			}
		}
		$_SESSION['name']=array_values($_SESSION['name']);
	}
	function get_order_total(){
		$max=count($_SESSION['name']);
		$sum=0;
		
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['name'][$i]['productid'];
			$q=$_SESSION['name'][$i]['qty'];
			$price=get_price($pid);
            $sum+=$price*$q;
		}
			
			
		return $sum;
	}
	function addtocart($pid,$q,$un){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['name'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['name']);
			$_SESSION['name'][$max]['productid']=$pid;
			$_SESSION['name'][$max]['qty']=$q;
			$_SESSION['name'][$max]['un']=$un;	
		}
		else{
			$_SESSION['name']=array();
			$_SESSION['name'][0]['productid']=$pid;
			$_SESSION['name'][0]['qty']=$q;
			$_SESSION['name'][0]['un']=$un;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['name']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['name'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>