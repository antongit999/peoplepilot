<div class="magazineImages form" >
<?php echo $this->Form->create('MagazineImage', array("url" => "/admin/magazineImages/add/" . $this->data['MagazineImage']['magazine_id'], 'type' => 'file'));?>
		<h2><?php __('Add Magazine Image'); ?></h2>
	<?php
	    echo $this->Form->hidden("Page.redir", array("value" => $this->data['Page']['redir']));
	    for($i = 0; $i<20; $i++){
    	    echo $this->Form->hidden("MagazineImage." . $i. '.id');
    		echo $this->Form->hidden("MagazineImage." . $i. '.magazine_id', array('value' => $this->data['MagazineImage']['magazine_id']));
    		echo $this->Form->file("MagazineImage." . $i. '.file');
    		echo $this->Form->input("MagazineImage." . $i. '.caption', array('type' => 'textarea', 'style' => 'width:350px; height:100px;'));
    		echo "<div style='margin-botton:10px; border-bottom:1px solid;'></div>";
	    }
		
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
