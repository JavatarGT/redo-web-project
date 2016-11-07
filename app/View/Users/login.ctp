<div>
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>

	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<?php echo $this->element('form_login') ?>
			</section>
		</div>

		<div id="register" class="animate form registration_form">
			<section class="login_content">
				<?php echo $this->element('form_signin') ?>
			</section>
		</div>
	</div>
</div>