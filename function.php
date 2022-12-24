<?php
function getShippingDate($orderDate, $orderTime) {
	
    $allHolidays = array('24-12-2022','25-12-2022', '26-12-2022','27-12-2022'); 
    $cutOffTime = "11:00"; 
    
    if($orderTime >= $cutOffTime) { 
       
           array_push($allHolidays, $orderDate); 
           while(in_array($orderDate,$allHolidays)) { 
               $orderDate = date('d-m-Y', strtotime("$orderDate +1 day")); 
             }
        return $orderDate;
    }else{ 
         while(in_array($orderDate,$allHolidays)) {
             if($orderDate == date('d-m-Y')){ 
                 $orderDate = date('d-m-Y', strtotime("$orderDate +1 day"));
             }else {
                 $orderDate = date('d-m-Y', strtotime("$orderDate +1 day"));
             }
         }
        return $orderDate;
    }
    return false;
}

if(isset($_POST['call'])){
 echo getShippingDate($_POST['date'], $_POST['time']);   
}

?>

