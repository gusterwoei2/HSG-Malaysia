<?php
require('library/page.php');

$pageid = $_GET['id'];
$setpage = new page();
$setpage->pagename ='testimonies';
$setpage->addheadline ='<link rel="stylesheet" href="css/modalboxstyles.css">';
$setpage->displayheader();
$setpage->submenupageid = $pageid;
$setpage->displaysubmenu();
$setpage->displaycontent();
$setpage->displayfooter();

?>

