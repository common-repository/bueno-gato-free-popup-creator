<?php
	include_once 'activate.php';
	/*FUNCTIONS THAT LOAD THE UI****************************************************** */
	//load the main page, activ4tion stuffs
	function bgt_pop_main_squeezers_cb()
	{ ?>

		
			<div id="main_page">
				<div id="thankyou">
					<h2>Thanks for using the plugin</h2>
					<p>We hope you enjoy the plugin. If you have any suggestion, request, please contact me at:</p>
					<p>Gmail: t2dx.inc@gmail.com</p>
					<p>I will get back to you a.s.a.p</p>
				</div>
				<div>
					<h2>How to use the plugin?</h2>
					<p><strong>Step 1</strong></p>
					<p>You go to Settings and click on complete setup, just like the image below:</p>
					<p><img src="<?php echo plugins_url("themes/common/tut1.jpg", __FILE__); ?>" /></p>
					<p><strong>Step 2</strong></p>
					<p>Watch the videos below to know how to edit and create the popup</p>
					<ol>
						<li><a href="http://www.youtube.com/watch?v=L9sXUXcVu3o&list=PL6rw2AEN42EokAMtZtmHvoK9bVCO9MBOp&index=3" target="_blank">How to edit text on the page</a></li>
						
						<li><a href="http://www.youtube.com/watch?v=BXU1mW4dXB0&list=PL6rw2AEN42EokAMtZtmHvoK9bVCO9MBOp&index=7" target="_blank">Duplicate elements</a></li>
						
						<li><a href="http://www.youtube.com/watch?v=Z17mTZTdMZI&list=PL6rw2AEN42EokAMtZtmHvoK9bVCO9MBOp&index=8" target="_blank">How to remove elements</a></li>
						
						<li><a href="http://www.youtube.com/watch?v=FvzoKPkRD6s&list=PL6rw2AEN42EokAMtZtmHvoK9bVCO9MBOp&index=10" target="_blank">How to use your autoresponder code</a></li>
						
						<li><a href="http://www.youtube.com/watch?v=fU7lDX2HIhQ&list=PL6rw2AEN42EokAMtZtmHvoK9bVCO9MBOp&index=14" target="_blank">Creating your first popup</a></li>
						
						<li><a href="http://www.youtube.com/watch?v=W7bofm4_Qfk&list=PL6rw2AEN42EokAMtZtmHvoK9bVCO9MBOp&index=15" target="_blank">Setting options for your popup</a></li>

					</ol>
					<p><strong>Step 3</strong>(optional)</p>
					<p>Well, send me an email if you have problem.</p>
					<br /><br />
				</div>
			</div>	
	<?php }
    
    	
	//build the setting pages
	function bgt_pop_sub_squeezers_settings_cb()
	{
		
		echo '<h2>Complete basic setups</h2>';
		echo '<form method="post" action="">
				<input name="basic_setup" type="submit" value="Complete setup" class="button-primary"/>
			</form>
		
		';
		
		if (isset($_POST['basic_setup']))
		{
			bgt_pop_sq_bgt_on_act();
		}

	}