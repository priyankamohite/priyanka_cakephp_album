<?php
class Tag extends AppModel {
    public $name = 'Tag';
    public $hasMany = array(
        'AlbumsTag' => array(
            'className'     => 'AlbumsTag',
            'foreignKey'    => 'tag_id'
        )
    );

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>