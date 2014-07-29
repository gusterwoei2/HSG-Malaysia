<?php
require('library/page.php');

$pageid = $_GET['id'];
$setpage = new page();
$setpage->pagename ='missions';
$setpage->displayheader();
$setpage->submenupageid = $pageid;
$setpage->displaysubmenu();
$setpage->displaycontent();
$setpage->displayfooter();

?>

