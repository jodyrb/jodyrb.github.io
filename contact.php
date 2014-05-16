
<?php
@HeaderParam("content-type") String content-type=application/json
if (isset($_POST['name'], $_POST['mobile'])) {
	echo 'Your name is ' . $_POST['name'];
}