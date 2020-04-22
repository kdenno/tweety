<?php getHeader(); ?>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">

<div class="nav-container">
  <!-- Nav -->
  <div class="nav">
		<div class="nav-left">
			<ul>
				<li><a href="<?php echo URLROOT;?>/timelines"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
				<li><a href="<?php echo URLROOT;?>i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notifications</a></li>
				<li id="messagePopup"><i class="fa fa-envelope" aria-hidden="true"></i>Messages<span id="messages"></li>
			</ul>
		</div><!-- nav left ends-->
		<div class="nav-right">
			<ul>
				<li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i>
					<div class="search-result"> 			
					</div>
				</li>
 				<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata']->profileImage;?>"/></label>
				<input type="checkbox" id="drop-wrap1">
				<div class="drop-wrap">
					<div class="drop-inner">
						<ul>
							<li><a href="<?php echo URLROOT.'/users/profile/'.$data['userdata']->username; ?>"><?php echo $data['userdata']->username;?></a></li>
							<li><a href="<?php echo URLROOT;?>/settings/account">Settings</a></li>
							<li><a href="<?php echo URLROOT;?>/users/logout.php">Log out</a></li>
						</ul>
					</div>
				</div>
				</li>
				<li><label class="addTweetBtn" for="pop-up-tweet">Tweet</label></li>
				 
				 
			</ul>
		</div><!-- nav right ends-->
	</div><!-- nav ends -->

</div><!-- nav container ends -->
</div><!-- header wrapper end -->
		
	<div class="container-wrap">

		<div class="lefter">
			<div class="inner-lefter">

				<div class="acc-info-wrap">
					<div class="acc-info-bg">
						<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata']->profileCover;?>"/> <!--cover -->
					</div>
					<div class="acc-info-img">
						<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata']->profileImage;?>"/> <!--profileImage -->
					</div>
					<div class="acc-info-name">
						<h3><?php echo $data['userdata']->screenName;?></h3>
						<span><a href="<?php echo URLROOT."/users/profile/".$data['userdata']->username; ?>">@<?php echo $data['userdata']->username;?></a></span>
					</div>
				</div><!--Acc info wrap end-->

				<div class="option-box">
					<ul> 
						<li>
							<a href="<?php echo URLROOT?>/settings/account" class="bold">
							<div>
								Account
								<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>
						<li>
							<a href="<?php echo URLROOT;?>/settings/password">
							<div>
								Password
								<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>
					</ul>
				</div>

			</div>
		</div><!--LEFTER ENDS-->
		
		<div class="righter">
			<div class="inner-righter">
				<div class="acc">
					<div class="acc-heading">
						<h2>Account</h2>
						<h3>Change your basic account settings.</h3>
					</div>
					<div class="acc-content">
					<form method="POST" action="<?php echo URLROOT?>/settings/account">
						<div class="acc-wrap">
							<div class="acc-left">
								Username
							</div>
							<div class="acc-right">
								<input type="text" name="username" value="<?php echo $data['userdata']->username;?>"/>
								<span>
								<?php  if(isset($data['username_err'])){echo $data['username_err'];}?>
								</span>
							</div>
						</div>

						<div class="acc-wrap">
							<div class="acc-left">
								Email
							</div>
							<div class="acc-right">
								<input type="text" name="email" value="<?php echo $data['userdata']->email;?>"/>
								<span>
									<?php  if(isset($data['email_err'])){echo $data['email_err'];}?>
                                    
								</span>
							</div>
						</div>
						<div class="acc-wrap">
							<div class="acc-left">
								
							</div>
							<div class="acc-right">
								<input type="Submit" name="submit" value="Save changes"/>
							</div>
							<div class="settings-error">
								<?php // if(isset($error['fields'])){echo $error['fields'];}?>
   							</div>	
						</div>
					</form>
					</div>
				</div>
				<div class="content-setting">
					<div class="content-heading">
						
					</div>
					<div class="content-content">
						<div class="content-left">
							
						</div>
						<div class="content-right">
							
						</div>
					</div>
				</div>
			</div>	
		</div><!--RIGHTER ENDS-->
		<div class="popupTweet"></div>
	</div>
	<!--CONTAINER_WRAP ENDS-->

	</div><!-- ends wrapper -->
    <?php getFooter(); ?>