<?php
//enter stuff
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>baaREI</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/popupmenu.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xsmall.css" />
			<link rel="stylesheet" href="css/style-small.css" />
			<link rel="stylesheet" href="css/style-medium.css" />
			<link rel="stylesheet" href="css/style-large.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript></head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">baaREI</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">About Us</a></li> <!-- Meet Asad & Omer, Vision Values, Careers, Contact us -->
						<li><a href="generic.html">Customers</a></li>
						<li><a href="elements.html">Partners</a></li>
						<li><a href="#">Log In</a></li>
						<li><button class="button special" data-toggle="modal" data-target="#myModal">Sign Up</button></li>
					</ul>
				</nav>
			</header>

				<script>
  				$(function() {
  				  $( "#startDatepicker" ).datepicker();
  				});
  				</script>
  
   				<script>
  				$(function() {
  				  $( "#endDatepicker" ).datepicker();
  				});
  				$( function() {
  	  				 
  				    $( "#city" ).autocomplete({
  				      source: function( request, response ) {
  				        $.ajax( {
  				          url: "http://gd.geobytes.com/AutoCompleteCity",
  				          dataType: "jsonp",
  				          data: {
  				            q: request.term
  				          },
  				          success: function( data ) {
  				 
  				            // Handle 'no match' indicated by [ "" ] response
  				            response( data.length === 1 && data[ 0 ].length === 0 ? [] : data );
  				          }
  				        } );
  				      },
  				      minLength: 3
  				    } );
  				  } );
  				</script>

		<!-- Banner -->
			<section id="banner">
				<h2>Ultimate Event Planner</h2>
				<p>Conferences, off-sites, marketing events, weddings, personal travel events all from one place</p>
				<br></br>

	<ul class="actions">
		<li><input type="text" id="city" placeholder="Enter location..." /> 
		<input type="text" id="startDatepicker" placeholder="Start date" /> 
		<input type="text" id="endDatepicker" placeholder="End date" /> 
		<input type="text" id="numGuests" placeholder="Number of Guests" /> <ahref="#" class="button">Search</a></li>
	</ul>
	</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Business/Personal Events Made Easy</h2>
						<p>baarREI scales to your needs from personal event/travel to enterprise business conference planning</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-cloud"></i>
								<h3>Simplify</h3>
								<p>Planning individual/group travel, lodging...</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i>
								<h3>Personalize</h3>
								<p>Convenient and responsive attendee experience...</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-rocket"></i>
								<h3>Intelligent</h3>
								<p>smart budget tracking helps you get more bang for the buck</p>
							</section>
						</div>
					</div>
				</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>About Us</h3>
								<ul class="unstyled">
									<li><a href="#">Our founders</a></li>
									<li><a href="#">baaREI Values</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">baaREI Research</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Customer Success Stories</h3>
								<ul class="unstyled">
									<li><a href="#">Fadfhg F8 planning</a></li>
									<li><a href="#">Safgd dreamforce planning</a></li>
									<li><a href="#">How DDD uses baaREI</a></li>
									<li><a href="#">John's Euro trip</a></li>
									<li><a href="#">Maria's wedding</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Businesses</h3>
								<ul class="unstyled">
									<li><a href="#">Reporting</a></li>
									<li><a href="#">Secure Information</a></li>
									<li><a href="#">Terms of Use</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Peronsal Events</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>baaREI Inc.</li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>


  


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="top: 20%;">
<form action="php/register.php" method="post">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
      <div class="container">    
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                                 
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                                      <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>
                                
                                
            
                            </form>
                         </div>
                    </div>       
                
         </div> 
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  </form>
</div>
	</body>
</html>


