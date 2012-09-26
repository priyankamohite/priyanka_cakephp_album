<h1>Albums</h1>
<?php echo $this->Html->link('Add Album', array('controller' => 'albums', 'action' => 'add')); ?>
<?php echo "<br/>" ?>
<?php echo $this->Html->link('Show Artists', array('controller' => 'artists', 'action' => 'index')); ?>
<?php echo "<br/>" ?>
<?php echo $this->Html->link('Show tags', array('controller' => 'tags', 'action' => 'index')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Artist</th>
        <th>Description</th>
        <th>Price</th>
        <th>Release date</th>
        <th>Isfeatured</th>
        <th>Tag</th>
    </tr>


    <?php foreach ($albums as $album): ?>
    <tr>
        <td><?php echo $album['Album']['id']; ?></td>
        <td><?php echo $album['Album']['name']; ?></td>
        <!-- <td><?php echo $album['Artist']['name']; ?></td> -->
        <td>
            <?php

            foreach ($album['AlbumsArtist'] as $artist)
            {

                echo $artist['Artist']['name'];
                echo "<br/>";
                // }
            }

            ?>
        </td>

        <td>
            <?php echo $this->Html->link($album['Album']['description'],
            array('controller' => 'albums', 'action' => 'view', $album['Album']['id'])); ?>
        </td>
        <td><?php echo $album['Album']['price']; ?></td>
        <td><?php echo $album['Album']['release_date']; ?></td>
        <td><?php echo $album['Album']['isFeatured']; ?></td>
        <td>
            <?php

            foreach ($album['AlbumsTag'] as $tag)
            {
                echo $tag['Tag']['name'];
                echo "<br/>";
            }

            ?>
        </td>

        <td>
            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $album['Album']['id']),
            array('confirm' => 'Are you sure?'));
            ?>

        </td>


    </tr>
    <?php endforeach; ?>
    <?php unset($album); ?>
</table>