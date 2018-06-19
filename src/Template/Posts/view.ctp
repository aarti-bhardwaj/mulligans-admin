<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Post Images'), ['controller' => 'PostImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post Image'), ['controller' => 'PostImages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posts view large-9 medium-8 columns content">
    <h3><?= h($post->id) ?></h3>
    <table class="vertical-table">
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
    <div class="related">
        <h4><?= __('Related Post Images') ?></h4>
        <?php if (!empty($post->post_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Post Id') ?></th>
                <th scope="col"><?= __('Image Name') ?></th>
                <th scope="col"><?= __('Image Path') ?></th>
                <th scope="col"><?= __('Is Approved') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($post->post_images as $postImages): ?>
            <tr>
                <td><?= h($postImages->id) ?></td>
                <td><?= h($postImages->post_id) ?></td>
                <td><?= h($postImages->image_name) ?></td>
                <td><?= h($postImages->image_path) ?></td>
                <td><?= h($postImages->is_approved) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PostImages', 'action' => 'view', $postImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PostImages', 'action' => 'edit', $postImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PostImages', 'action' => 'delete', $postImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
