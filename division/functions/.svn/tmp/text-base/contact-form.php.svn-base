<?php
	function tj_contact_form()
	{
		$result = tj_send_email();
		
		if ( $result == __('Successfully sent!') ){
			return '<p class="contact-form-success success">'.$result.'</p>';
		} else 	{
			if ( !empty($result) ){
				$result = '<p class="contact-form-error error">'.$result.'</p>';
			}

			rewind_posts();
			ob_start();
			?>
			<?php if($result != ""):?>
				<div id="note"><?php echo $result; ?></div>
			<?php endif; ?>
			<form action="<?php echo get_permalink(); ?>" method="post" id="tj-contact-form">
			    	<input type="hidden" name="tj_form_sent" value="1" />
			    	<p class="formp"><input class="textbox" type="text" name="tj_from" value="<?php echo $_POST['tj_from']; ?>" /><label>Your Name</label></p>
			    	<p class="formp"><input class="textbox" type="text" name="tj_email" value="<?php echo $_POST['tj_email']; ?>" /><label>Email Adress</label></p>
			    	<p class="formp"><input class="textbox" type="text" name="tj_subject" value="<?php echo $_POST['tj_subject']; ?>" /><label>Subject</label></p>
			    	<p class="formp"><textarea class="textbox" name="tj_message" rows="5" cols="50"><?php echo $_POST['tj_message']; ?></textarea></p>
					<div class="button button-white">
						<input id="contact-form-submit" class="button-text" type="submit" name="submit" value="Submit" />
						<span class="button-right"></span>
					</div>
			</form>
			<?php
		}
		return ob_get_clean();
	}
	
	function tj_send_email()
	{
		$result = tj_check_form();
			
		if ($result === true){
			$result = '';
			
			$to	= get_theme_mod('contact_form_email');
			$from = get_bloginfo('admin_email');
		
			$name		= $_POST['tj_from'];
			$email		= $_POST['tj_email'];
			$subject	= $_POST['tj_subject'].' - '.get_bloginfo('name').' - Contact Form';
			$msg		= $_POST['tj_message'];
	
			$headers =
			"MIME-Version: 1.0\r\n".
			"Reply-To: \"$name\" <$email>\r\n".
			"Content-Type: text/plain; charset=\"".get_settings('blog_charset')."\"\r\n";
			if ( !empty($from) )
				$headers .= "From: $name - ".get_bloginfo('name')." <$from>\r\n";
	
			$fullmsg =
			'Name: '.$name."\r\n".
			'Email: '.$email."\r\n\r\n".
			'Subject: '.$_POST['tj_subject']."\r\n\r\n".
			wordwrap($msg, 76, "\r\n")."\r\n\r\n".
			'Browser: '.$_SERVER['HTTP_USER_AGENT']."\r\n";
			
			// send mail
			if ( wp_mail( $to, $subject, $fullmsg, $headers) ){
				unset($_POST);
				$result = __('Successfully sent!');
			} else {
				$result = __('An error occurred while sending your email.');
			}
		}
		return $result;
	}
	
	function tj_check_form()
	{
		if(!isset($_POST['tj_form_sent']) || $_POST['tj_form_sent'] != "1"){
			return '';
		}
		
		$_POST['tj_from'] = stripslashes(trim($_POST['tj_from']));
		$_POST['tj_email'] = stripslashes(trim($_POST['tj_email']));
		$_POST['tj_subject'] = stripslashes(trim($_POST['tj_subject']));
		$_POST['tj_message'] = stripslashes(trim($_POST['tj_message']));
	
		$error = array();
		if ( empty($_POST['tj_from']) )
			$error[] = __('Name');
		if ( !is_email($_POST['tj_email']) )
			$error[] = __('Email');
		if ( empty($_POST['tj_subject']) )
			$error[] = __('Subject');
		if ( empty($_POST['tj_message']) )
			$error[] = __('Your Message');
		if ( !empty($error) )
			return __('<b>Check these fields:</b>').' '.implode(', ', $error);
		
		return true;
	}
	
	function tj_contact_form_shortcode()
	{
		return tj_contact_form();
	}
	
	add_shortcode('tj-contact-form', 'tj_contact_form_shortcode');