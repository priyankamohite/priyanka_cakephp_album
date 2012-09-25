
<h1>Tags</h1>
<?php echo $this->Html->link('Add Tag', array('controller' => 'tags', 'action' => 'add')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Action</th>

    </tr>

    <?php foreach ($tags as $tag): ?>
    <tr>
        <td><?php echo $tag['Tag']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($tag['Tag']['name'],
            array('controller' => 'tags', 'action' => 'view', $tag['Tag']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $tag['Tag']['id']),
            array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $tag['Tag']['id'])); ?>
        </td>

    </tr>
    <?php endforeach; ?>
    <?php unset($tag); ?>
</table>