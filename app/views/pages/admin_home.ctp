<?php 
    $count = 0;
    echo "<div class='form'>";
    echo $form->create("ImageSize", array('url' => $this->here));
    foreach($this->data as $imageSize){
        $imageSize = $imageSize['ImageSize'];
        echo $form->hidden("ImageSize." . $count . ".id", array("value" => $imageSize['id']));
        echo $form->input("ImageSize." . $count++ . ".value", array("value" => $imageSize['value'], 'label' => $form->label($imageSize['name'])));
    }
    echo $form->submit("Save");
    echo $form->end();
    echo "</div>";
?>