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
                <th>Approve Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($post->post_images as $image): ?>
            <tr>
                 <td><img style = "width: 40px; height: auto" src="<?= $image->image_url ?>"></td>
                <td>Approve: <?= $this->Form->checkbox('is_approved', ['label' => false, 'checked'=> $image->is_approved ? "checked" : "", 'id' =>  $image->id 'name' => 'checked' ]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
     
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>



    <script>
        $('input[name=is_approved]').change(function(e) {
        e.preventDefault();
        console.log('In hitting api');

        // Determine ID
         var objId = $(this).attr('id');
         console.log(objId);
        

        var isChecked = $("input:checkbox").is(":checked") ? 1:0; 
        console.log('is checked' + isChecked);
        $.ajax({
                  type: 'PUT',
                  url: host+"posts/edit"+objId,
                  data: { is_approved:isChecked }
        });        
        });
        </script>