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

<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
    			<ul class="pull-right">
                  <?= $this->Html->link(__('Download Zip'), ['controller' => 'Posts', 'action' => 'downloadZip', $post->id], ['class' => 'btn btn-warning']) ?>
                </ul>
    
                    <?= $this->Form->create($post) ?>
                    <fieldset>
                       <table class = 'table' cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($post->post_images as $image): ?>
                                <tr>
                                     
                                     <td><?= $this->Html->link($this->Html->image($image->image_url ,array( 'height'=>'60','width'=> '60')),$image->image_url, array('target'=>'_blank','escape'=>false)); ?></td>
                                    <td>Approve: <?= $this->Form->checkbox('is_approved', ['label' => false, 'checked'=> $image->is_approved ? "checked" : "", 'data-image_id' =>  $image->id , 'data-id' => $post->id, 'name' => 'checked' ]); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'pull-right']) ?>
                    <?= $this->Form->end() ?>
			</div> <!-- .ibox-content ends --> 
		</div> <!-- .ibox ends -->
	</div> <!-- .col-lg-12 ends -->
</div> <!-- .row ends -->

<script>
        $('input[name=checked]').change(function(e) {
        e.preventDefault();
        console.log('In hitting api');

        // Determine ID
        var host = "<?= $this->Url->build('/', true) ?>"
        var objId = $(this).data('image_id');
         var postId =  $(this).data('id');
         console.log(objId);
        

        var isChecked = $("input:checkbox").is(":checked") ? 1:0; 
        console.log('is checked' + isChecked);
        $.ajax({
                  type: 'PUT',
                  url: host+"posts/edit/"+postId,
                  data: { is_approved:isChecked, id:objId }
        });    
            alert('Status updated!');    
        });
</script>