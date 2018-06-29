<?php
namespace App\Controller;

use App\Controller\AppController;
use ZipArchive;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $postIds = $this->Posts->find()->extract('id')->toArray();

        $posts = $this->Posts->find()->contain(['PostImages'])
                                     ->matching('PostImages', function($q) use($postIds){
                                        return $q->where(['PostImages.post_id IN' => $postIds]);
                                     })
                                     ->indexBy('id')
                                     ->toArray();
        $posts = array_unique($posts);
        // $posts = $this->paginate($this->Posts);
        $this->set('posts', $posts);
        $this->set(compact('posts'));

    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['PostImages']
        ]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['PostImages']
        ]);

        // if(isset($post->post_images) && !empty($post->post_images)) {

        // $files = array();
        // foreach ($post->post_images as $key => $image) {
        //     array_push($files, $image->image_url);
        //         }
        // $zipname = 'file.zip';
        // $zip = new ZipArchive;
        // $zip->open($zipname, ZipArchive::CREATE);
        // foreach ($files as $file) {
        //   $zip->addFile($file);
        // }
        // $zip->close();
        // }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data();
            // $bar_id = $this->getParams('pass.0');
            // pr($data); die;
            $this->loadModel('PostImages');
            $postImage = $this->PostImages->findById($data['id'])->first();
            $postImage = $this->PostImages->patchEntity($postImage, $this->request->getData());
            if ($this->PostImages->save($postImage)) {
                $this->Flash->success(__('Image has been approved'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Not able to approve image. Please, try again.'));
        }
        $this->set(compact('post', $post));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function downloadZip($id= null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['PostImages']
        ]);

        if(isset($post->post_images) && !empty($post->post_images)) {
            $files = array(); /*Image array*/
        foreach ($post->post_images as $key => $image) {
            array_push($files, 'uploads/'.$image->image_name);

        }


        # create new zip opbject
        $zip = new ZipArchive();

        # create a temp file & open it
        $tmp_file = tempnam('.','');
        $zip->open($tmp_file, ZipArchive::CREATE);

        # loop through each file
        foreach($files as $file){

            # download file
            // $download_file = file_get_contents($file);

            #add it to the zip
            // $zip->addFromString(basename($file),$download_file);
            $zip->addFile($file, basename($file));

        }

        # close zip
        $zip->close();

        # send the file to the browser as a download
        header('Content-disposition: attachment; filename=download.zip');
        header('Content-type: application/zip');
        readfile($tmp_file);
        }
        pr('completed'); die;
        $this->set(compact('post', $post));
        $this->set(compact('zip', $zip));

    }

    public function isAuthorized($user)
    {
        // By default deny access.
        return true;
    }
}
