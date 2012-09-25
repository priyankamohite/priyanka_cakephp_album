<?php
class AlbumsTag extends AppModel
{
    public $name = 'AlbumsTag';
    public $belongsTo = array(
        'Album' => array(
            'className'    => 'Album',
            'foreignKey'   => 'album_id'
        ),
        'Tag' => array(
            'className'    => 'Tag',
            'foreignKey'   => 'tag_id'
        )
    );
}

?>