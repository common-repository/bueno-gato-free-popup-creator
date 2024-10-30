<?php
	/* Template name: Blank Template
	
	*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php
	echo the_title();

	?></title>
	<?php if (get_option('sq_user_tracking_code') !== false) 
		{echo get_option('sq_user_tracking_code');}
	
	?>
	<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>
                
<?php if (get_option('sq_social_bar_status') == 'enable')
{
    echo (get_option('sq_social_scripts'));
    echo base64_decode(get_option('sq_social_code'));

} 


?>
</body></html>
