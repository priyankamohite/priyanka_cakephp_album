<?php
class AlbumsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        pr($this->Album->find('all'));
        $this->set('albums', $this->Album->find('all',array('recursive' => 2)));
        $this->set('artists', $this->Album->AlbumsArtist->find('all'));
        $this->set('tags', $this->Album->AlbumsTag->find('all'));
    }
    public function view($id = null) {
        $this->Album->id = $id;
        $this->set('album', $this->Album->read());
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Album->create();
            if ($this->Album->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Album has been saved.');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->set('artists',$this->Album->AlbumsArtist->Artist->find('all'));
                $this->set('tags',$this->Album->AlbumsTag->Tag->find('all'));

            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Album->delete($id)) {
            $this->Session->setFlash('The album with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
}
?>
