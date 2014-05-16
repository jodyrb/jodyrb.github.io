<?php
server {
    listen 80;
    client_max_body_size 4G;
 
    access_log /var/sites/webapp/logs/access.maintenance.log;
    error_log /var/sites/webapp/logs/error.maintenance.log info;
 
    server_name api.webapp.com;
 
    # this guy redirects any path to /api.json
    rewrite ^.*$ /api.json last;
 
    location / {
        root /var/sites/webapp/webapp/;
        index api.json /api.json;
 
        # this is the magic
        error_page 405 = $uri;
    }
 
}
$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

	if (empty($_POST['name']))
		$errors['name'] = 'Name is required.';

	if (empty($_POST['mobile']))
		$errors['mobile'] = 'Mobile is required.';

	if (empty($_POST['preferredGateway']))
		$errors['preferredGateway'] = 'preferred gateway is required.';

// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

}
if (isset($_POST['name'], $_POST['mobile'], $_POST['preferredGateway'])) {
	echo 'Your name is ' . $_POST['name'];
}
		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);