<?php 

$home = "views/home.php";
  
if(isset($_GET['p']))
{  
  $p = $_GET['p'];
  switch (true) 
  {
    case ($_GET['p']=='operador'):         
        include 'controller/Operador.php';     
        break;

    case ($_GET['p']=='tarifa'):       
        include 'controller/Tarifa.php'; 
        break;
  
    default:
        include $home;
        break;
  }
}
else
{
    include $home;
}

?>



