<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function(){
        jQuery("#name").validate({
            expression: "if (VAL) return true; else return false;",
            message: "invalid name"
        });

        jQuery("#description").validate({
            expression: "if (VAL) return true; else return false;",
            message: "invalid description"
        });

        jQuery("#price").validate({
            expression: "if (VAL return true; else return false;",
            message: "invalid price"
        });

        jQuery("#release_date").validate({
            expression: "if (VAL) return true; else return false;",
            message: "invalid release_date"
        });

        jQuery("#bitrate").validate({
            expression: "if (VAL) return true; else return false;",
            message: "invalid bitrate"
        });

        jQuery("#metadata").validate({
            expression: "if (VAL) return true; else return false;",
            message: "invalid metadata"
        });
    });
</script>




<h1>Add Album</h1>
<?php
echo $this->Form->create('Album');
echo $this->Form->input('name',array('id'=>'name'));
echo $this->Form->input('description',array('id'=>'description'));
echo $this->Form->input('price',array('id'=>'price'));
echo $this->Form->input('release_date',array('id'=>'release_date'));
echo $this->Form->input('bitrate',array('id'=>'bitrate'));
echo $this->Form->input('metadata',array('id'=>'metadata'));
echo $this->Form->input('isFeatured',array('id'=>'isFeatured'));

echo "Select Artist<br/>";
foreach ($artists as $artist)
{
    echo $this->Form->checkbox('Artist.'.$artist['Artist']['id'],array('value'=>$artist['Artist']['id']));
    echo $artist['Artist']['name'];
    echo "<br>";
}
echo "<br/>Select Tags<br/>";
foreach ($tags as $tag)
{
    echo $this->Form->checkbox('Tag.'.$tag['Tag']['id'],array('value'=>$tag['Tag']['id']));
    echo $tag['Tag']['name'];
    echo "<br>";
}


echo $this->Form->end('Save Album');



?>

