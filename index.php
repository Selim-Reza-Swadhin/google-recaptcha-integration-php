<?php 
	if(isset($_POST['post'])) {
		//print_r($_POST);
		//exit();
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6Leo86YaAAAAALPiF8jaXwDIjSxh6uQpHvIFvIg2",
			'response' => $_POST['token'],
			 'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );
          /*echo "<pre>";
		  print_r($options);
		  exit();*/

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);
		 /* echo "<pre>";
		  print_r($response);
		  exit();*/

		$res = json_decode($response, true);
		/*var_dump($res);
		exit();*/
		if($res['success'] == true) {

			// Perform you logic here for ex:- save you data to database
  			echo '<div class="alert alert-success">
			  		<strong>Success!</strong> Your inquiry successfully submitted.
		 		  </div>';
		} else {
			echo '<div class="alert alert-warning">
					  <strong>Error!</strong> You are not a human.
				  </div>';
		}
	}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Learn Web Recaptcha Coding > Google reCAPTHA V3 integration in PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
    	.card {
    		width: 70%;
    		margin: 0 auto;
    	}
    </style>
    <script src="https://www.google.com/recaptcha/api.js?render=6Leo86YaAAAAAA3pS0CG76nvePUWgBAUi2vSGoGm"></script>
  
  </head>
  <body>
  
	<div class="container">
	    <center><h1>Google reCAPTHA V3 integration in PHP</h1><img src="recaptcha.png"></center>
	    <hr>
	    <div class="card">
		  	<h3 class="card-header info-color white-text text-center py-4">
		    	<strong>What's in you mind, let us know</strong>
		  	</h3>
		  	<div class="card-body px-lg-5 pt-0">
		    	<form id="enq-frm" role="form" method="post" action="#" class="form-horizontal">
				<div class="form-group">
	              	<div class="input-group">
	                    <div class="input-group-addon addon-diff-color">
	                        <span class="glyphicon glyphicon-user"></span>
	                    </div>
	                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Full Name">
	              	</div>
	            </div>
	            <div class="form-group">
	            	<div class="input-group">
	                    <div class="input-group-addon addon-diff-color">
	                        <span class="glyphicon glyphicon-envelope"></span>
	                    </div>
	                	<input type="email" class="form-control" id="uemail" name="uemail" placeholder="Email Address">
	            	</div>
	            </div>
	            <div class="form-group">
	            	<div class="input-group">
	                    <div class="input-group-addon addon-diff-color">
	                        <span class="glyphicon glyphicon-envelope"></span>
	                    </div>
	                	<textarea class="form-control" id="msg" name="msg" placeholder="Enter your message" rows="5"></textarea>
	            	</div>
	            </div>
	            <div class="form-group">
	                <input type="submit" value="Post" class="btn btn-success btn-block" name="post">
	            </div> 
	            <input type="hidden" id="token" name="token">
	        	</form>
			</div>
		</div>
	</div>
	<div style="position: fixed; bottom: 30px; left: 20px; color: green;">
	    <strong>
	        Learn recaptcha
	    </strong>
	</div>
  </body>

  <script>
//   grecaptcha.ready(function() {
//       grecaptcha.execute('6Leo86YaAAAAAA3pS0CG76nvePUWgBAUi2vSGoGm', {action: 'homepage'}).then(function(token) {
//          console.log(token);
//          document.getElementById("token").value = token;
//       });
//   });
  </script>

  <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
      grecaptcha.execute('6Leo86YaAAAAAA3pS0CG76nvePUWgBAUi2vSGoGm', {action: 'homepage'}).then(function(token) {
         console.log(token);
         document.getElementById("token").value = token;
      });
  });
      }
  

  </script>

</html>