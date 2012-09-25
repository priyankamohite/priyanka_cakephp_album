<?php
class TagsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('tags', $this->Tag->find('all'));
    }

    public function view($id = null) {
        $this->Tag->id = $id;
        $this->set('tag', $this->Tag->read());
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Tag->create();
            if ($this->Tag->save($this->request->data)) {
                $this->Session->setFlash('Tag has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add tag.');
            }
        }
    }

    public function edit($id = null) {
        $this->Tag->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Tag->read();
        } else {
            if ($this->Tag->save($this->request->data)) {
                $this->Session->setFlash('Tag has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update tag.');
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Tag->delete($id)) {
            $this->Session->setFlash('The tag with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

}
?>