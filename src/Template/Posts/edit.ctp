<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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
                <td>Approve: <?= $this->Form->checkbox('is_approved', ['label' => false, 'checked'=> $image->is_approved ? "checked" : "", 'data-imageId' =>  $image->id , 'data-id' => $post->id, 'name' => 'checked' ]); ?></td>
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
        var host = "<?= $this->Url->build('/', true) ?>"
         var objId = $(this).data('imageId');
         var postId =  $(this).data('id');
         console.log(objId);
        

        var isChecked = $("input:checkbox").is(":checked") ? 1:0; 
        console.log('is checked' + isChecked);
        $.ajax({
                  type: 'PUT',
                  url: host+"posts/edit/"+postId,
                  data: { is_approved:isChecked, post_id:postId }
        });        
        });
        </script>