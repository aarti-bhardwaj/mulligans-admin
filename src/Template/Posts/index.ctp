<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>

        
    
<div class="row">
    <div class="col-lg-12">
    <!--<div class="posts index large-9 medium-8 columns content">-->

        <div class="ibox float-e-margins">
            <div class = 'ibox-title'>
                <h3><?= __('Posts') ?></h3>
            </div>
            <div class = "ibox-content">
                <table class = 'table' cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('S.No') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('asking_price') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('product_description') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('images') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $key => $post): ?>
                        <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $this->Number->format($post->asking_price) ?></td>
                                <td><?= h($post->product_description) ?></td>
                                <td><?= h($post->first_name) ?></td>
                                <td><?= h($post->last_name) ?></td>
                                <td><?= h($post->email) ?></td>
                                <td><?= h($post->phone) ?></td>
                                <td><?= h($post->created) ?></td>
                                 <td><?= $this->Html->link(__('Images'), ['action' => 'edit', $post->id],['style'=>"
                                    border: solid 1px;
                                    padding:  5px 13px 5px 11px;
                                    background-color:  blue;
                                    color: white;"]); ?></td>
                                <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
                
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
           <!--  <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div> -->
<!-- </div> -->
        </div><!-- .ibox  end -->
    </div><!-- .col-lg-12 end -->
</div><!-- .row end -->
