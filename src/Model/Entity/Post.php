<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property float $asking_price
 * @property string $product_description
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\PostImage[] $post_images
 */
class Post extends Entity
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
        'asking_price' => true,
        'product_description' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'post_images' => true
    ];
}
