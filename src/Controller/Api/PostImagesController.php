<?php
namespace App\Controller\Api;
use App\Controller\Api\ApiController;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Log\Log;
use Cake\Core\Configure;

/* Controller
*
* @property \App\Model\Table\PostTable $Posts
*/
class PostImagesController extends ApiController
{
  public function initialize()
  {

    parent::initialize();
  }
    
  /**
   * Add method for creating posts
   *
   * @return \Cake\Network\Response|void Redirects on successful add.
   */
  public function add()
  {
      $req = $this->request->data();
    
     $target_path = WWW_ROOT . Configure::read('ImageUpload.uploadImage');
      $file = $_FILES['file']['name'];
      //sanitize filename
      $file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $file);
      $file = time().$file;
      $success = false;
      $data = [];
      if ($file != '') {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path.DS.$file)) {
            
            $data = [
                      'file_path' => 'webroot'.DS.Configure::read('ImageUpload.uploadImage').DS,
                      'file_name' => $file,
                      'post_id'   => $req['post_id']
                    ];
                  
        } 
      }

 pr($data); die;   
    $postImage = $this->PostImages->newEntity();
      if ($this->request->is('post')) {
          $postImage = $this->PostImages->patchEntity($postImage, $data);
          if ($this->PostImages->save($postImage)) {
            $data =array();
            $data['status']=true;
            $data['data'] = $postImage;
            $this->set('data',$data['data']);
            $this->set('status',$data['status']);
            $this->set('_serialize', ['status','data']);
          }
      }
  

      if(!$this->request->is(['post'])){
        throw new MethodNotAllowedException(__('BAD_REQUEST'));
      }

     
      
      $this->set('status',$success);
      $this->set('data',$data);
      $this->set('_serialize', ['status','data']);
    }
  
}
