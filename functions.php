
<?php
	function myinfo($info,$type,$icon){
	echo "<div class='alert alert-" . $type . " alert-dismissible fade show mb-0' role='alert'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	echo "<span aria-hidden='true'>×</span>";
    echo "</button>";
    echo "<i class='fa fa-". $icon ." mx-2'></i>";
    echo "<strong>" . $info . "</strong>";
    echo "</div>";
	}
?>