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
        <!-- <?php
            echo $this->Form->control('asking_price');
            echo $this->Form->control('product_description');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
        ?> -->
        <?php foreach ($post->post_images as $image): ?>
            <tr>
                <td><img src="<?= $image->image_url ?>"></td>
                <td>Aproove: <?= $this->Form->checkbox('is_approved', ['label' => false, 'checked'=> $image->is_approved ? "checked" : "", 'id' => 'is_approved']); ?>></td>
            </tr>
            <?php endforeach; ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
