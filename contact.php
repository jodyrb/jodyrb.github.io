
<?php
if ($request_method != GET) {
  proxy_pass http://foobar;
  break;
}
if (isset($_POST['name'], $_POST['mobile'])) {
	echo 'Your name is ' . $_POST['name'];
}