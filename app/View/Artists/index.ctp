<h1>Artists</h1>
<?php echo $this->Html->link('Add Artist', array('controller' => 'artists', 'action' => 'add')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Website</th>
        <th>Contact-email</th>
        <th>metadata</th>
        <th>metadescription</th>
        <th>isFeatured</th>
    </tr>



    <?php foreach ($artists as $artist): ?>
    <tr>
        <td><?php echo $artist['Artist']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($artist['Artist']['name'],
            array('controller' => 'artists', 'action' => 'view', $artist['Artist']['id'])); ?>
        </td>
        <td><?php echo $artist['Artist']['username']; ?></td>
        <td><?php echo $artist['Artist']['website']; ?></td>
        <td><?php echo $artist['Artist']['contact_email']; ?></td>
        <td><?php echo $artist['Artist']['metadata']; ?></td>
        <td><?php echo $artist['Artist']['metadescription']; ?></td>
        <td><?php echo $artist['Artist']['isFeatured']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($artist); ?>
</table>




