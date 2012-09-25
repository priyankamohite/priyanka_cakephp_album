
<h1>Edit Tag</h1>
    <?php
echo $this->Form->create('Tag', array('action' => 'edit'));
echo $this->Form->input('name');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Tag');
