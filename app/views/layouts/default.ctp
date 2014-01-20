<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('People Pilot :: '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
				'cake.generic',
		        'style',
		        'facebox'
		));
		
		echo $javascript->link(array(
		    'jquery-1.5.2.min',
		    'facebox',
		    'main'
		));

		echo $scripts_for_layout;
	
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 id="logo">
                <img src="/img/360fashion-admin-header.jpg"/>
                </h1> 
			<?php if($session->check('Auth.User.id')) :?>
				<ul class='navigation' id='postLoginNavigation' style='color:white'>
					<li><?php echo $session->read('Auth.User.first_name') . ' ' . $session->read('Auth.User.last_name')?></li>
					<?php if($session->read('Auth.User.id')) :?>
						<li><a href="/admin">Admin</a></li>
					<?php endif;?>
					<li class='last'><a href="/users/logout/">Logout</a></li>
				</ul>
			<?php endif;?>
		</div>
		<div id="mainContainer">

			<div id='content'>
			<?php echo $this->Session->flash(); 
			?>
			<?php 
			    echo $this->element("admin_nav");
			echo $content_for_layout; ?>
			</div>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php 
	if(Configure::read("debug"))
	    echo $this->element('sql_dump'); 
	
	?>
</body>
</html>