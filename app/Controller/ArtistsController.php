<?php
class ArtistsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('artists', $this->Artist->find('all'));
    }

    public function view($id = null) {
        $this->Artist->id = $id;
        $this->set('artist', $this->Artist->read());
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Artist->create();
            if ($this->Artist->save($this->request->data)) {
                $this->Session->setFlash('Artist has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add artist.');
            }
        }
    }
}
?>