<?php
    class AlbumsArtist extends AppModel
    {
        public $name = 'AlbumsArtist';

        public $belongsTo = array(
            'Album' => array(
                'className'    => 'Album',
                'foreignKey'   => 'album_id'
            ),
            'Artist' => array(
                'className'    => 'Artist',
                'foreignKey'   => 'artist_id'
            )
        );
    }
?>