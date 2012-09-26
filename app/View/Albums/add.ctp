
<h1>Add Album</h1>
<?php
echo $this->Form->create('Album');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('price');
echo $this->Form->input('release_date');
echo $this->Form->input('bitrate');
echo $this->Form->input('metadata');
echo $this->Form->input('isFeatured');


//echo $this->Form->input('artist', array(
//        'options'=>array(1,2,3,4
////        'options' => array(
////            foreach($artists as $artist)
////                echo $artist['Artist']['name'];
//        ),
//        'empty' => '--select--'
//    ));

foreach ($artists as $artist)
{
    echo $this->Form->checkbox('Artist.'.$artist['Artist']['id'],array('value'=>$artist['Artist']['id']));
    echo $artist['Artist']['name'];
    echo "<br>";
}

echo $this->Form->end('Save Album');



?>
