<?php if (has_flash('message')):?>
<?php $arr = get_flash('message');?>
<div class="alert alert-<?php echo $arr['type']?> alert-dismissible fade show" role="alert">
  <strong><?php echo $arr['msg'] ?></strong> <?php echo $arr['msgc'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>