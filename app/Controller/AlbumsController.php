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
//                $album_artist=array('AlbumArtist'=>array(
//                   '0'=>array('album_id'=>1,'artist_id'=>1),
//                   '1'=>array('album_id'=>2,'artist_id'=>2)
//               ));
               // pr($album_artist);die;
//               if($this->AlbumsArtist->save($this->request->data))
//              {
//                   $this->Session->setFlash('AlbumArtist has been saved.');
//               }

               // pr($this->request->data);die;

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
                    //$this->Album->AlbumsArtist->save(array('album_id'=>$this->request->data['Album']['id'],'artist_id'=>$this->request->data['Artist']['id']));
                }
                $this->Album->AlbumsArtist->saveAll($album_artist_send);
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
