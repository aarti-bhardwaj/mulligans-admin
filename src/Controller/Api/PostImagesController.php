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
    if(!$this->request->is(['post'])){
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    } 
    if(!isset($_FILES['ionicfile']) && (isset($_FILES['ionicfile']) && !$_FILES['ionicfile'])){
      throw new BadRequestException(__('Kindly provide valid image'));
    }

    $req = $this->request->data();
    
   $target_path = WWW_ROOT . Configure::read('ImageUpload.uploadImage');
    $file = $_FILES['ionicfile']['name'];
    //sanitize filename
    $file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $file);
    $file = time().$file;
    $data = [];
    if ($file != '') {
      if (move_uploaded_file($_FILES['ionicfile']['tmp_name'], $target_path.DS.$file)) {
          
          $data = [
                    'image_path' => 'webroot'.DS.Configure::read('ImageUpload.uploadImage').DS,
                    'image_name' => $file,
                    'post_id'   => $req['post_id']
                  ];
                
      } 
    }   
    $postImage = $this->PostImages->newEntity();
    $postImage = $this->PostImages->patchEntity($postImage, $data);
    if ($this->PostImages->save($postImage)) {
      $data =array();
      $data['status']=true;
      $data['data'] = $postImage;
      $this->set('data',$data['data']);
      $this->set('status',$data['status']);
      $this->set('_serialize', ['status','data']);
    } else {
      $data['status']=false;
      $this->set('data',$data);
      $this->set('_serialize', ['data']);
    }
     
  }
  
}
