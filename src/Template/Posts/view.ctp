<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>

        
    
<!-- <div class="posts view large-9 medium-8 columns content"> -->
<div class = 'row'>
    <div class = 'col-lg-12'>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3><?= h($post->id) ?></h3>
            </div> <!-- ibox-title end-->
            <div class="ibox-content">
                <table class="table">
                                                                                <tr>
                        <th scope="row"><?= __('Product Description') ?></th>
                        <td><?= h($post->product_description) ?></td>
                    </tr>
                                                                                <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td><?= h($post->first_name) ?></td>
                    </tr>
                                                                                <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($post->last_name) ?></td>
                    </tr>
                                                                                <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($post->email) ?></td>
                    </tr>
                                                                                <tr>
                        <th scope="row"><?= __('Phone') ?></th>
                        <td><?= h($post->phone) ?></td>
                    </tr>
                                                                                                                                            <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($post->id) ?></td>
                    </tr>
                                        <tr>
                        <th scope="row"><?= __('Asking Price') ?></th>
                        <td><?= $this->Number->format($post->asking_price) ?></td>
                    </tr>
                                                                                                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($post->created) ?></td>
                    </tr>
                                        <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($post->modified) ?></td>
                    </tr>
                                                                            </table>
                            </div> <!-- ibox-content end -->
        </div> <!-- ibox end-->
    </div><!-- col-lg-12 end-->
</div> <!-- row end-->
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
        <h4><?= __('Related Post Images') ?></h4>
        </div>
        <?php if (!empty($post->post_images)): ?>
        <div class="ibox-content">
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Post Id') ?></th>
                                <th scope="col"><?= __('Image Name') ?></th>
                                <th scope="col"><?= __('Image Path') ?></th>
                                <th scope="col"><?= __('Image Url') ?></th>
                                <th scope="col"><?= __('Is Approved') ?></th>
            </tr>
            <?php foreach ($post->post_images as $postImages): ?>
            <tr>
                                <td><?= h($postImages->id) ?></td>
                                <td><?= h($postImages->post_id) ?></td>
                                <td><?= h($postImages->image_name) ?></td>
                                <td><?= h($postImages->image_path) ?></td>
                                <td><?= h($postImages->image_url) ?></td>
                                <td><?= h($postImages->is_approved) ?></td>
                                                
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!-- .ibox-content end -->
        <?php endif; ?>
    
    </div><!-- ibox end-->
    </div><!-- .col-lg-12 end-->
    </div><!-- .row end-->
<!-- </div>
 -->