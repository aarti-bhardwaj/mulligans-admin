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


<script >
      $('input[name=checked]').on('click', fav);

            function fav(e) {
              console.log('In ajax');
              var objId = $(this).attr('id');
              console.log(objId);
              var is_approved = $("input:checkbox").is(":checked") ? 1:0;
              var request = {
                'is_approved': is_approved
              }

             $.ajax({
                    url: host+"posts/edit"+objId,
                    headers:{"accept":"application/json"},
                    dataType: 'json',
                    data: request,
                    type: "put",
                    success:function(data){
                        console.log('ajax success');
                        
                        console.log(response);
                    error:function(){
                        console.log('ajax error');
                    }
                });
            }
            
    </script>