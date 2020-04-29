<?php
getHeader();
?>

<div class="wrapper">
	<!-- header wrapper -->
	<div class="header-wrapper">

		<div class="nav-container">
			<!-- Nav -->
			<div class="nav">

				<div class="nav-left">
					<ul>
						<li><a href="<?php echo URLROOT . '/timelines'; ?>"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
						<li><a href="i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification</a></li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i>Messages</li>
					</ul>
				</div><!-- nav left ends-->

				<div class="nav-right">
					<ul>
						<li>
							<input type="text" placeholder="Search" class="search" />
							<i class="fa fa-search" aria-hidden="true"></i>
							<div class="search-result">
							</div>
						</li>

						<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata'][0]->profileImage; ?>" /></label>
							<input type="checkbox" id="drop-wrap1">
							<div class="drop-wrap">
								<div class="drop-inner">
									<ul>
										<li><a href="<?php echo URLROOT . '/users/profile/' . $data['userdata'][0]->username; ?>"><?php echo $data['userdata'][0]->username; ?></a></li>
										<li><a href="settings/account">Settings</a></li>
										<li><a href="<?php echo URLROOT; ?>/users/logout">Log out</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><label class="addTweetBtn">Tweet</label></li>
					</ul>
				</div><!-- nav right ends-->

			</div><!-- nav ends -->

		</div><!-- nav container ends -->

	</div><!-- header wrapper end -->


	<!---Inner wrapper-->
	<div class="inner-wrapper">
		<div class="in-wrapper">
			<div class="in-full-wrap">
				<div class="in-left">
					<div class="in-left-wrap">
						<div class="info-box">
							<div class="info-inner">
								<div class="info-in-head">
									<!-- PROFILE-COVER-IMAGE -->
									<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata'][0]->profileCover; ?>" />
								</div><!-- info in head end -->
								<div class="info-in-body">
									<div class="in-b-box">
										<div class="in-b-img">
											<!-- PROFILE-IMAGE -->
											<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata'][0]->profileImage; ?>" />
										</div>
									</div><!--  in b box end-->
									<div class="info-body-name">
										<div class="in-b-name">
											<div><a href="<?php echo URLROOT . '/users/profile/' . $data['userdata'][0]->username; ?>"><?php echo $data['userdata'][0]->screenName; ?></a></div>
											<span><small><a href="<?php echo URLROOT . '/users/profile/' . $data['userdata'][0]->username; ?>">@<?php echo $data['userdata'][0]->username; ?></a></small></span>
										</div><!-- in b name end-->
									</div><!-- info body name end-->
								</div><!-- info in body end-->
								<div class="info-in-footer">
									<div class="number-wrapper">
										<div class="num-box">
											<div class="num-head">
												TWEETS
											</div>
											<div class="num-body">
												10
											</div>
										</div>
										<div class="num-box">
											<div class="num-head">
												FOLLOWING
											</div>
											<div class="num-body">
												<span class="count-following"><?php echo $data['userdata'][0]->following; ?></span>
											</div>
										</div>
										<div class="num-box">
											<div class="num-head">
												FOLLOWERS
											</div>
											<div class="num-body">
												<span class="count-followers"><?php echo $data['userdata'][0]->followers; ?></span>
											</div>
										</div>

									</div><!-- mumber wrapper-->
								</div><!-- info in footer -->
							</div><!-- info inner end -->
						</div><!-- info box end-->

						<!--==TRENDS==-->
						<!---TRENDS HERE-->
						<!--==TRENDS==-->


					</div><!-- in left wrap-->
				</div><!-- in left end-->
				<div class="in-center">
					<div class="in-center-wrap">
						<!--TWEET WRAPPER-->
						<div class="tweet-wrap">
							<div class="tweet-inner">
								<div class="tweet-h-left">
									<div class="tweet-h-img">
										<!-- PROFILE-IMAGE -->
										<img src="<?php echo URLROOT; ?>/images/<?php echo $data['userdata'][0]->profileImage; ?>" />
									</div>
								</div>
								<div class="tweet-body">
									<form method="post" action="<?php echo URLROOT; ?>/timelines/tweet" enctype="multipart/form-data">
										<textarea class="status" name="status" placeholder="Type Something here!" rows="4" cols="50"></textarea>
										<div class="hash-box">
											<ul>
											</ul>
										</div>
								</div>
								<div class="tweet-footer">
									<div class="t-fo-left">
										<ul>
											<input type="file" name="tweetimg" id="file" />
											<li><label for="file"><i class="fa fa-camera" aria-hidden="true"></i></label>
												<span class="tweet-error"><?php if (!empty($data['status_err'])) {
																				echo $data['status_err'];
																			}
																			if (!empty($data['tweetimg_err'])) {
																				echo $data['tweetimg_err'];
																			} ?></span>
											</li>
										</ul>
									</div>
									<div class="t-fo-right">
										<span id="count">140</span>
										<input type="submit" name="tweet" value="tweet" />
										</form>
									</div>
								</div>
							</div>
						</div>
						<!--TWEET WRAP END-->



						<!--Tweet SHOW WRAPPER-->
						<div class="tweets">
							<!--TWEETS HERE-->

							<?php
							foreach ($data['userdata'] as $data) { ?>

								<div class="all-tweet">
									<div class="t-show-wrap">
										<div class="t-show-inner">
											<!-- this div is for retweet icon 
	<div class="t-show-banner">
		<div class="t-show-banner-inner">
			<span><i class="fa fa-retweet" aria-hidden="true"></i></span><span>Screen-Name Retweeted</span>
		</div>
	</div>
	-->
											<div class="t-show-popup">
												<div class="t-show-head">
													<div class="t-show-img">
														<img src="<?php echo URLROOT; ?>/images/<?php echo $data->profileImage; ?>" />
													</div>
													<div class="t-s-head-content">
														<div class="t-h-c-name">
															<span><a href="PROFILE-LINK"><?php echo $data->screenName; ?></a></span>
															<span>@<?php echo $data->username; ?></span>
															<span><?php echo $data->postedOn; ?></span>
														</div>
														<div class="t-h-c-dis">
															<?php echo $data->status; ?>
														</div>
													</div>
												</div>
												<!--tweet show head end-->
												<div class="t-show-body">
													<div class="t-s-b-inner">
														<div class="t-s-b-inner-in">
															<img src="<?php echo URLROOT; ?>/tweetimages/<?php echo $data->tweetImage; ?>" class="imagePopup"  />
														</div>
													</div>
												</div>
												<!--tweet show body end-->
											</div>
											<div class="t-show-footer">
												<div class="t-s-f-right">
													<ul>
														<li><button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button></li>
														<li><button><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></button></li>
														<li><button><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></button></li>
														<li>
															<a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
															<ul>
																<li><label class="deleteTweet">Delete Tweet</label></li>
															</ul>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>

							<?php
							}
							?>




						</div>
						<!--TWEETS SHOW WRAPPER-->

						<div class="loading-div">
							<img id="loader" src="assets/images/loading.svg" style="display: none;" />
						</div>
						<div class="popupTweet"></div>
						<!--Tweet END WRAPER-->

					</div><!-- in left wrap-->
				</div><!-- in center end -->

				<div class="in-right">
					<div class="in-right-wrap">

						<!--Who To Follow-->
						<!--WHO_TO_FOLLOW HERE-->
						<!--Who To Follow-->

					</div><!-- in left wrap-->

				</div><!-- in right end -->

			</div>
			<!--in full wrap end-->

		</div><!-- in wrappper ends-->
	</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->


<?php getFooter(); ?>