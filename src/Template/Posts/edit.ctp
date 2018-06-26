<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>

<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Post Images') ?></legend>
     

     <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Images</th>
                <th>Aproove Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($post->post_images as $image): ?>
            <tr>
                 <td><img style = "width: 40px; height: auto" src="<?= $image->image_url ?>"></td>
                <td>Aproove: <?= $this->Form->checkbox('is_approved', ['label' => false, 'checked'=> $image->is_approved ? "checked" : "", 'id' => 'is_approved']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
     




        <!-- <?php foreach ($post->post_images as $image): ?>
            
             <tr>
                <td><img style = "width: 40px; height: auto" src="<?= $image->image_url ?>"></td>
                <td>Aproove: <?= $this->Form->checkbox('is_approved', ['label' => false, 'checked'=> $image->is_approved ? "checked" : "", 'id' => 'is_approved']); ?></td>
            </tr>
            <?php endforeach; ?> -->
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
