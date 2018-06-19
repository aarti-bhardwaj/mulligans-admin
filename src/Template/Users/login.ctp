<div class="users form large-10 medium-8 columns content" style="margin:0px 0px 0px 100px;" >
<h2>Login</h2>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>

<?= $this->Form->end() ?>
</div>