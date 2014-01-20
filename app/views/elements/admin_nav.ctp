<?php if($session->check('Auth.User.id')):?>

<div class='clear' style='margin-top:0px; margin-bottom:0px;'></div>

<div style='width: 100%; margin-bottom:15px;'> 
<ul class='navigation' id='adminNavigation'>
	<li><a href='/admin'>Image sizes</a></li>
	
	<li><a href='/admin/users'>Users</a></li>
	<li class=''><a href='/admin/magazines'>Magazines</a></li>
	<li class='last'><a href='/admin/newsTags'>News Tags</a></li>
</ul>
</div>
<?php endif;?>