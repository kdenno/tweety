<?php getHeader(); ?>

<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">
	<div class="nav-container">
    	<div class="nav">
		<div class="nav-left">
			<ul>
				<li><a href="<?php echo URLROOT; ?>/timelines"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
      	  <?php if(isLoggedIn()){ ?>
        	    <li><a href="<?php echo URLROOT; ?>i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification</a></li>
  			    <li id="messagePopup"><i class="fa fa-envelope" aria-hidden="true"></i>Messages</li>
      	  <?php } ?>
			</ul>
		</div><!-- nav left ends-->
		<div class="nav-right">
			<ul>
				<li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i>
					<div class="search-result">
					</div>
				</li>
        <?php if(isLoggedIn()){ ?>
				<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata']->profileImage;?>"/></label>
				<input type="checkbox" id="drop-wrap1">
				<div class="drop-wrap">
					<div class="drop-inner">
						<ul>
							<li><a href="<?php echo URLROOT."/users/profile/".$data['userdata']->username; ?>"><?php echo $data['userdata']->username; ?></a></li>
							<li><a href="<?php echo URLROOT; ?>/settings/account">Settings</a></li>
							<li><a href="<?php echo URLROOT; ?>/users/logout">Log out</a></li>
						</ul>
					</div>
				</div>
				</li>
				<li><label for="pop-up-tweet" class="addTweetBtn">Tweet</label></li>
      <?php }else{
        echo '<li><a href="'.URLROOT.'/users">Have an account? Log in!</a></li>';
      } ?>
      </ul>
		</div><!-- nav right ends-->

	</div><!-- nav ends -->
	</div><!-- nav container ends -->
</div><!-- header wrapper end -->
<!--Profile cover-->
<div class="profile-cover-wrap">
<div class="profile-cover-inner">
	<div class="profile-cover-img">
		<!-- PROFILE-COVER -->
		<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata']->profileCover;?>"/>
	</div>
</div>
<div class="profile-nav">
 <div class="profile-navigation">
	<ul>
		<li>
		<div class="n-head">
			TWEETS
		</div>
		<div class="n-bottom">
		  10
		</div>
		</li>
		<li>
			<a href="<?php echo URLROOT.'/users/following/'.$data['userdata']->username; ?>">
				<div class="n-head">
					<a href="<?php echo URLROOT.'/users/following/'.$data['userdata']->username; ?>">FOLLOWING</a>
				</div>
				<div class="n-bottom">
					<span class="count-following"><?php echo $data['userdata']->following;?></span>
				</div>
			</a>
		</li>
		<li>
		 <a href="<?php echo URLROOT.'/users/followers/'.$data['userdata']->username; ?>">
				<div class="n-head">
					FOLLOWERS
				</div>
				<div class="n-bottom">
					<span class="count-followers"><?php echo $data['userdata']->followers;?></span>
				</div>
			</a>
		</li>
		<li>
			<a href="#">
				<div class="n-head">
					LIKES
				</div>
				<div class="n-bottom">
					0
				</div>
			</a>
		</li>
	</ul>
	<div class="edit-button">
		<span><button class="f-btn follow-btn"><i class="fa fa-user-plus"></i>Follow</button></span>	
	</div>
    </div>
</div>
</div><!--Profile Cover End-->

<!---Inner wrapper-->
<div class="in-wrapper">
 <div class="in-full-wrap">
   <div class="in-left">
     <div class="in-left-wrap">
	<!--PROFILE INFO WRAPPER END-->
	<div class="profile-info-wrap">
	 <div class="profile-info-inner">
	 <!-- PROFILE-IMAGE -->
		<div class="profile-img">
			<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata']->profileImage;?>"/>
		</div>

		<div class="profile-name-wrap">
			<div class="profile-name">
				<a href="<?php echo URLROOT.'/users/profile/'.$data['userdata']->username; ?>"><?php echo $data['userdata']->screenName; ?></a>
			</div>
			<div class="profile-tname">
				@<span class="username"><?php echo $data['userdata']->username; ?></span>
			</div>
		</div>

		<div class="profile-bio-wrap">
		 <div class="profile-bio-inner">
		    <?php echo $data['userdata']->bio; ?>
		 </div>
		</div>

<div class="profile-extra-info">
	<div class="profile-extra-inner">
		<ul>
      <?php if(!empty($data['userdata']->country)){ ?>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<?php echo $data['userdata']->country; ?>
				</div>
			</li>
    <?php } ?>

    <?php if(!empty($data['userdata']->website)){ ?>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-link" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<a href="<?php echo $data['userdata']->website; ?>" target="_blank"><?php echo $data['userdata']->website; ?></a>
				</div>
			</li>
    <?php } ?>

			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
 				</div>
			</li>
			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="profile-extra-footer">
	<div class="profile-extra-footer-head">
		<div class="profile-extra-info">
			<ul>
				<li>
					<div class="profile-ex-location-i">
						<i class="fa fa-camera" aria-hidden="true"></i>
					</div>
					<div class="profile-ex-location">
						<a href="#">0 Photos and videos </a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="profile-extra-footer-body">
		<ul>
			 <!-- <li><img src="#"/></li> -->
		</ul>
	</div>
</div>

	 </div>
	<!--PROFILE INFO INNER END-->

	</div>
	<!--PROFILE INFO WRAPPER END-->

	</div>
	<!-- in left wrap-->

  </div>
	<!-- in left end-->

<div class="in-center">
	<div class="in-center-wrap">

 	</div><!-- in left wrap-->
  <div class="popupTweet"></div>
 </div>
<!-- in center end -->

<div class="in-right">
	<div class="in-right-wrap">

		<!--==WHO TO FOLLOW==-->
			  <!-- HERE -->
		<!--==WHO TO FOLLOW==-->

		<!--==TRENDS==-->
	 	 	<!-- HERE -->
	 	<!--==TRENDS==-->

	</div><!-- in right wrap-->
</div>
<!-- in right end -->

		</div>
		<!--in full wrap end-->
	</div>
	<!-- in wrappper ends-->
 </div>
 <!-- ends wrapper -->

<?php getFooter();?>