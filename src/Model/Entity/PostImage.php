<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
}
