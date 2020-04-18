<?php getHeader(); ?>
  <div class="wrapper">
  <!-- nav wrapper -->
  <div class="nav-wrapper">

  	<div class="nav-container">
  		<div class="nav-second">
  			<ul>
  				<li><a href="#"<i class="fa fa-twitter" aria-hidden="true"></i></a></li>
  			</ul>
  		</div><!-- nav second ends-->
  	</div><!-- nav container ends -->

  </div><!-- nav wrapper end -->

  <!---Inner wrapper-->
  <div class="inner-wrapper">
  	<!-- main container -->
  	<div class="main-container">
  		<!-- step wrapper-->
    <?php if ($data['step'] == '1') {?>
   		<div class="step-wrapper">
  		    <div class="step-container">
  				<form method="post" action="<?php echo URLROOT;?>/users/steps">
  					<h2>Choose a Username</h2>
  					<h4>Don't worry, you can always change it later.</h4>
  					<div>
  						<input type="text" name="username" placeholder="Username"/>
  					</div>
  					<div>
  						<ul>
  						  <li><div class="err"><?php if (!empty($data['username_err'])){echo $data['username_err'];} ?></div></li>
  						</ul>
  					</div>
  					<div>
  						<input type="submit" name="next" value="Next"/>
  					</div>
  				 </form>
  			</div>
  		</div>
    <?php } ?>
    <?php if ($data['step'] == '2'){?>
  	<div class='lets-wrapper'>
  		<div class='step-letsgo'>
  			<h2>We're glad you're here, <?php echo $data['username']; ?> </h2>
  			<p>Tweety is a constantly updating stream of the coolest, most important news, media, sports, TV, conversations and more--all tailored just for you.</p>
  			<br/>
  			<p>
  				Tell us about all the stuff you love and we'll help you get set up.
  			</p>
  			<span>
  				<a href='<?php echo URLROOT;?>/timelines' class='backButton'>Let's go!</a>
  			</span>
  		</div>
  	</div>
  <?php } ?>

  	</div><!-- main container end -->

  </div><!-- inner wrapper ends-->
  </div><!-- ends wrapper -->

 <?php getFooter(); ?>