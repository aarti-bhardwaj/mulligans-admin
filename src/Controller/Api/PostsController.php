<?php
namespace App\Controller\Api;
use App\Controller\Api\ApiController;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Log\Log;
/* Players Controller
*
* @property \App\Model\Table\PostTable $Posts
*/
class PostsController extends ApiController
{
  public function initialize()
  {

    parent::initialize();
    // $this->Auth->allow(['add']);
  }
    
  /**
   * Add method for creating posts
   *
   * @return \Cake\Network\Response|void Redirects on successful add.
   */
  public function add()
  {
    $data = $this->request->data();
    // pr('In API');
    // Log::write('debug', 'In add function');
    // Log::write('debug', $data);

    // if($data['ionicfile']) {
    //   $getFileArray = $this->addFiles($data);
    // }
    // pr($data); die;
    if(!$data) {
      throw new BadRequestException("Request data not found.");
    }
    if(!isset($data['first_name']) && (isset($data['first_name']) && !$data['first_name'])){
      throw new BadRequestException(__('Kindly provide valid name'));
    }
    if(!isset($data['asking_price']) && (isset($data['asking_price']) && !$data['asking_price'])){
      throw new BadRequestException(__('Kindly provide valid price of the product'));
    }
    // if(!isset($data['image_name']) && (isset($data['image_name']) && !$data['image_name'])){
    //   throw new BadRequestException(__('Kindly provide valid image'));
    // }
    // $data['post_images'][] = ['image_name' => $data['image_name'], $data['image_path']];


    $post = $this->Posts->newEntity();
      if ($this->request->is('post')) {
          $post = $this->Posts->patchEntity($post, $data);
          if ($this->Posts->save($post)) {
            $data =array();
            $data['status']=true;
            $data['data'] = $post;
            $this->set('data',$data['data']);
            $this->set('status',$data['status']);
            $this->set('_serialize', ['status','data']);
          }
      }
  }
  
}