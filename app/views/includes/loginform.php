<div class="login-div">
<form action="<?php echo URLROOT; ?>/users/login" method="post"> 
	<ul>
		<li>
		  <input type="text" name="email" placeholder="Please enter your Email here"/>
		  <?php if(!empty($data['signin']) && $data['email_err']){ ?><div class="err"><?php echo $data['email_err']; ?> </div> <?php }?>
		</li>
		<li>
		  <input type="password" name="password" placeholder="password"/><input type="submit" name="login" value="Log in"/>
		  <?php if(!empty($data['signin'])&& $data['password_err']){ ?><div class="err"><?php echo $data['password_err']; ?> </div> <?php }?>
		</li>
		<li>
		  <input type="checkbox" Value="Remember me">Remember me
		</li>
	</ul>
	<!--
	 <li class="error-li">
	  <div class="span-fp-error"></div>
	 </li> 
	-->
	</form>
</div>