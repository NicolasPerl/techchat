<?php
if(trim($_GET['user']) != "" && exec('grep '.escapeshellarg($_GET['user'].":").' ./passwd.txt')) {
	echo "taken";
} else {
	echo "available";
}
?>