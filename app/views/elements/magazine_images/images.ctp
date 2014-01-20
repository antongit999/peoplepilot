<style>
	ul.images li {display:inline-block; margin: 0px 70px 10px 0px;minwidth: 200px;}
	ul.images li input, ul.images li textarea, ul.images li img{display:block}
	 ul.images li textarea{margin: 10px 0px 20px;}
</style>

<?php 
echo $form->create("MagazineImage", array('url'=>"/admin/magazineImages/saveAll"));
echo $form->hidden("Page.redirect", array('value' => $this->here));
echo $form->hidden("Magazine.id", array('value' => $this->data['Magazine']['id']));
echo "<ul class='images'>";
$count = 0;
foreach($this->data['MagazineImage'] as $image){
    $src = "/img/magazines/" . $this->data['Magazine']['id'] . "/thumb_" . $image['file_name'];
    echo "<li>";
    echo $form->hidden("MagazineImage." . $count . ".id", array('value' => $image['id']));
    echo $form->hidden("MagazineImage." . $count . ".magazine_id", array('value' => $image['magazine_id']));
    $checked = ($this->data['Magazine']['magazine_image_id'] == $image['id']) ? "CHECKED" : "";
    echo sprintf("<input type='radio' name='data[Magazine][defaultImage][]' value='%s' $checked/>",  $image['id']);
    echo "<img src='" . $src. "'/>";
    echo $form->textarea("MagazineImage." . $count++ . ".caption",array('value' => $image['caption'], 'cols' =>5));
    echo $html->link("Delete", "/admin/magazineImages/delete/".$image['id'] . "?redir=" . $this->here, array('style'=> 'color:red'),"Are you sure?" );
    echo "</li>";    
}
echo "</ul>";
echo $form->submit("Update Image Info");
echo $form->end();
?>