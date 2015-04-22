<?php
/*
Template Name: New Scoot Template
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
	<script src="//use.typekit.net/plh5zpf.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<link href='http://fonts.googleapis.com/css?family=Dangrek|Siemreap' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/new-style.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
	<link href="css/ie.css" rel="stylesheet" />
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
</head>

	<body>
		<nav class="navbar navbar-static-top" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand white-logo" href="#">Scoot</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<?php 
							$args = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => false,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'nav navbar-nav pull-right',
								'menu_id'         => '',
								'echo'            => false,
								'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 2,
								'walker'          => new wp_bootstrap_navwalker()
							);
							$menu = wp_nav_menu( $args );
							echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
						?>
					</ul>
				</div>
			</div><!-- /.container -->
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="hero">
					<div class="jumbo">
						<div class="col-md-8 col-md-push-2">
							<a href="#" class="logo">Scoot</a>
							<h2>The quick and easy way to find entry-level jobs near you.</h2>
						</div>
					</div>
					<div class="job-search">
						<p>Start your job search now and find the job you want.</p>
						<form action="#" class="form-inline" method="get" name="s">
							<div class="form-group col-md-4">
								<input type="text" name="location" class="form-control" id="location" placeholder="What is your location?" />
							</div>
							<div class="form-group col-md-4">
								<select name="job-category" class="form-control" id="job-category">
									<option value="0" selected>Select a job category.</option>
									<option value="1">Job Category 1</option>
									<option value="2">Job Category 2</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<input type="submit" class="btn red-bg" value="I'm ready, take me to the jobs!" />
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<div class="container-fluid blue-bg">
			<div class="row">

				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/amazing-simple.jpg" alt="" />
					<h3>We Are Specialists</h3>
					<p>Scoot focuses in permanent or part-time jobs in the entry-to-mid level employment space. Scoot was built to help Malaysians discover job opportunities in the most efficient way possible, and deliver the best-suited job hunters to employers.</p>
				</div>

				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/best-results.jpg" alt="" />
					<h3>Tear Up Your CV</h3>
					<p>The traditional CV is on its way out. Our solution is the Scoot VisualCV - a distilled overview of your skills and experience, structured the way our employment providers like to read them.</p>
					<p>Creating a Scoot VisualCV is quick and easy, get started now!</p>
				</div>

				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/jobs-for-all.jpg" alt="" />
					<h3>Just the jobs you want.</h3>
					<p>The Scoot search filter has been designed to bring you only the type of jobs you are looking for - jobs you are looking for that suit you, in the locations you specify.</p>
				</div>

			</div>
		</div>

		<div class="container-fluid full-width">
			<div class="row">
				<div class="col-md-8 grid neg-margin-left" onclick="">
					<img src="<?php echo get_template_directory_uri(); ?>/images/metro.jpg" alt="" class="img-responsive" />
					<div class="grid-content whyScoot" data-bgcolor="#124269" data-opacity=".9">
						<h2>Why Scoot Works</h2>
						<div class="mill">
							<h4>Over 2 million entry level, part time, and casual job seekers in Malaysia</h4>
						</div>
						<div class="videocv">
							<h4>We're introducing a new feature soon, Video CV, unheard of in Malaysia.</h4>
						</div>
						<div style="clear:both"></div>
						<p>We want to hear from you! Please take our <a href="#">online job survey.</a></p>
					</div>
				</div>

				<div class="col-md-4 grid featured-job">
					<img src="<?php echo get_template_directory_uri(); ?>/images/fitness-concept.jpg" alt="" class="img-responsive" />
					<div class="grid-content" data-bgcolor="#651f2b" data-opacity=".95">
						<div class="job-header clearfix">
							<span class="featured">Featured Job</span>
							<p><span>RM3,500+</span> Monthly Income </p>
						</div>
						<div class="job-content">
							<h3>Sales Representative</h3>
							<p class="company-name">Fitness Concept</p>
							<a href="#" class="cta">Apply Now</a>
						</div>
						<div class="job-footer">
							<ul>
								<li class="active"><a href="#">Full Time</a></li>
								<li><a href="#">Kuala Lumpur</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="container-fluid full-width">
			<div class="row">

				<div class="col-md-4 grid featured-job double-neg-margin-left">
					<img src="<?php echo get_template_directory_uri(); ?>/images/e-sprit.jpg" alt="" class="img-responsive" />
					<div class="grid-content" data-bgcolor="#651f2b" data-opacity=".6">
						<div class="job-header">
							<span class="featured">Featured Job</span>
							<p><span>RM3,500+</span> Monthly Income </p>
						</div>
						<div class="job-content">
							<h3>Store Manager</h3>
							<p class="company-name">Esprit</p>
							<a href="#" class="cta">Apply Now</a>
						</div>
						<div class="job-footer">
							<ul>
								<li class="active"><a href="#">Full Time</a></li>
								<li><a href="#">Kuala Lumpur</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4 grid featured-job pos-margin-right" onclick="">
					<img src="<?php echo get_template_directory_uri(); ?>/images/beyond-veggie.jpg" alt="" class="img-responsive" />
					<div class="grid-content" data-bgcolor="#651f2b" data-opacity=".6">
						<div class="job-header">
							<span class="featured">Featured Job</span>
							<p><span>RM3,500+</span> Monthly Income </p>
						</div>
						<div class="job-content">
							<h3>Supervisor</h3>
							<p class="company-name">Beyond Veggie</p>
							<a href="#" class="cta">Apply Now</a>
						</div>
						<div class="job-footer">
							<ul>
								<li class="active"><a href="#">Full Time</a></li>
								<li><a href="#">Kuala Lumpur</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4 grid featured-job" onclick="">
					<img src="<?php echo get_template_directory_uri(); ?>/images/plain-red-bg.jpg" alt="" class="img-responsive" />
					<div class="grid-content" data-bgcolor="#651f2b" data-opacity=".6">
						<div class="job-header">
							<span class="featured">Featured Job</span>
							<p><span>RM3,500+</span> Monthly Income </p>
						</div>
						<div class="job-content">
							<h3>Sales Representative</h3>
							<p class="company-name">Beyond Veggie</p>
							<a href="#" class="cta">Apply Now</a>
						</div>
						<div class="job-footer">
							<ul>
								<li class="active"><a href="#">Full Time</a></li>
								<li><a href="#">Kuala Lumpur</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="container-fluid">
			<div class="row">

				<div class="our-clients">
					<h2>Our Clients</h2>
					<p>Some of the companies we've helped recruit excellent applicants for.</p>

					<ul class="clearfix">
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/brands/aiq.jpg" alt="Marks & Spencer" /></li>
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/brands/esprit.jpg" alt="Marks & Spencer" /></li>
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/brands/marks.jpg" alt="Marks & Spencer" /></li>
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/brands/proton.jpg" alt="Marks & Spencer" /></li>
						<!-- <li class="col-sm-6 col-md-3"><img src="images/brands/secret.jpg" alt="Marks & Spencer" /></li> -->
					</ul>
				</div>

			</div>
		</div>

		<div class="container-fluid full-width">
			<div class="row">

				<div class="job-seeking">
					<div class="col-md-6 grid text-center neg-margin-left" onclick="">
						<img src="<?php echo get_template_directory_uri(); ?>/images/post-a-job.jpg" alt="" class="img-responsive" />
						<div class="grid-content" data-bgcolor="#124269" data-opacity=".6">
							<div class="job-seeking-content">
								<h2>Post a Job</h2>
								<p>It's simple, easy, and free to post a job to our network.</p>
								<a href="#" class="cta">Post Your Job Today</a>
							</div>
						</div>
					</div>

					<div class="col-md-6 grid text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/find-a-job.jpg" alt="" class="img-responsive" />
						<div class="grid-content" data-bgcolor="#651f2b" data-opacity=".6">
							<div class="job-seeking-content">
								<h2>Find a Job</h2>
								<p>Sign up for free as a jobseeker and find me a suitable job.</p>
								<a href="#" class="cta">Start My Job Search</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="container-fluid">
			<div class="row">

				<div class="our-clients">
					<h2>In Association With</h2>
					<p>Some of the Universities we have partnered with...</p>

					<ul class="clearfix">
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/uni/help.jpg" alt="Marks & Spencer" /></li>
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/uni/sunway.jpg" alt="Marks & Spencer" /></li>
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/uni/taylors.jpg" alt="Marks & Spencer" /></li>
						<li class="col-sm-6 col-md-3"><img src="<?php echo get_template_directory_uri(); ?>/images/uni/uni-malay.jpg" alt="Marks & Spencer" /></li>
					</ul>
				</div>

			</div>
		</div>

		<footer>
			<div class="container-fluid">
				<div class="row">

					<div class="footer-navs clearfix">
						<div class="footer-nav">
							<h4>Scoot</h4>
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Testimonials</a></li>
								<li><a href="#">About Us</a></li>
							</ul>
						</div>
						<div class="footer-nav">
							<h4>Jobseekers</h4>
							<ul>
								<li><a href="#">Search</a></li>
								<li><a href="#">How It Works</a></li>
								<li><a href="#">Resume Builder</a></li>
							</ul>
						</div>
						<div class="footer-nav">
							<h4>Employers</h4>
							<ul>
								<li><a href="#">Post a Job</a></li>
								<li><a href="#">Login</a></li>
								<li><a href="#">Pricing &amp; Plans</a></li>
							</ul>
						</div>
					</div>
					<div class="footer-logo">
						<a href="#" title="Scoot">Scoot</a>
					</div>
				</div>
				<hr>

			</div>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/new-script.js"></script>
	</body>
</html>
