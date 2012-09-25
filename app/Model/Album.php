<?php
class Album extends AppModel {
    public $name='Album';

    public $hasMany = array(
        'AlbumsArtist' => array(
            'className'     => 'AlbumsArtist',
            'foreignKey'    => 'album_id'

        ),
        'AlbumsTag' => array(
            'className'     => 'AlbumsTag',
            'foreignKey'    => 'album_id'

        )

    );
}
?>