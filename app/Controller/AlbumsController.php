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
        if ($this->request->is('post'))
        {
            $this->Album->create();
            if ($this->Album->saveAssociated($this->request->data))
            {
                $id=$this->Album->id;
                $album_artist=array('album_id','artist_id');
                $artists=$this->request->data['Artist'];
                $cnt=0;
                foreach($artists as $artist)
                {
                    if($artist!=0)
                    {
                    $album_artist['album_id']=$id;
                    $album_artist['artist_id']=$artist;
                    $album_artist_send[$cnt++]=$album_artist;
                    }
                }
                $this->Album->AlbumsArtist->saveAll($album_artist_send);

                $tid=$this->Tag->id;
                $album_tag=array('album_id','tag_id');
                $tags=$this->request->data['Tag'];
                $cnt1=0;
                foreach($tags as $tag)
                {
                    if($tag!=0)
                    {
                        $album_tag['album_id']=$tid;
                        $album_tag['tag_id']=$tag;
                        $album_tag_send[$cnt1++]=$album_tag;
                    }
                }
                $this->Album->AlbumsTag->saveAll($album_tag_send);

                $this->Session->setFlash('Album has been saved.');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Album not saved.');
            }
        }
        else
        {
            $this->set('artists',$this->Album->AlbumsArtist->Artist->find('all'));
            $this->set('tags',$this->Album->AlbumsTag->Tag->find('all'));
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
