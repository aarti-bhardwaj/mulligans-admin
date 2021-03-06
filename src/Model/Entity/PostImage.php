<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Routing\Router;
/**
 * PostImage Entity
 *
 * @property int $id
 * @property int $post_id
 * @property string $image_name
 * @property string $image_path
 * @property bool $is_approved
 *
 * @property \App\Model\Entity\Post $post
 */
class PostImage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'post_id' => true,
        'image_name' => true,
        'image_path' => true,
        'is_approved' => true,
        'post' => true
    ];

    protected $_virtual = ['image_url'];
    
    protected function _getImageUrl()
    {
        if(isset($this->_properties['image_name']) && !empty($this->_properties['image_name'])) {
            $url = Router::url('/uploads/'.$this->_properties['image_name'],true);
        }else{
            $url = Router::url('/img/default-img.jpeg',true);
        }
        return $url;
    }
}
