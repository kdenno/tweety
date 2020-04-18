<form method="post" action="<?php echo URLROOT;?>/users/register">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
			<input type="text" name="screenName" placeholder="Full Name"/>
			<?php if(!empty($data['signup']) && $data['screenName_err']){ ?><div class="err"><?php echo $data['screenName_err']; ?> </div> <?php }?>
		</li>
		<li>
			<input type="email" name="regemail" placeholder="Email"/>
			<?php if(!empty($data['signup']) && $data['regemail_err']){ ?><div class="err"><?php echo $data['regemail_err']; ?> </div> <?php }?>
		</li>
		<li>
			<input type="password" name="regpassword" placeholder="Password"/>
			<?php if(!empty($data['signup']) && $data['regpass_err']){ ?><div class="err"><?php echo $data['regpass_err']; ?> </div> <?php }?>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Tweety">
		</li>
	</ul>
	<!--
	 <li class="error-li">
	  <div class="span-fp-error"></div>
	 </li> 
	-->
</div>
</form>