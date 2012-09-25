<?php
class Artist extends AppModel {
    public $name='Artist';

    public $hasMany = array(
        'AlbumsArtist' => array(
            'className'     => 'AlbumsArtist',
            'foreignKey'    => 'artist_id'
        )
    );
}
?>