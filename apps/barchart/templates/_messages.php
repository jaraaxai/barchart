<div id="messages">

  <?php if(has_slot("form") && ($form = get_slot('form')) && $form->renderGlobalErrors()) : ?>
  <div class="error">
    <?php echo $form->renderGlobalErrors() ?>
  </div>
  <?php endif ?>
  
  <?php if ($sf_user->getFlash('success')): ?>
    <div class="success"><?php echo $sf_user->getFlash('success')?></div>  
  <?php endif; ?>
  
  <?php if ($sf_user->getFlash('info')): ?>
    <div class="info"><?php echo $sf_user->getFlash('info')?></div>
  <?php endif; ?>
  
  <?php if ($sf_user->getFlash('warning')): ?>
    <div class="warning"><?php echo $sf_user->getFlash('warning')?></div>
  <?php endif; ?>
  
  <?php if ($sf_user->getFlash('error')): ?>
    <div class="error alert"><?php echo $sf_user->getFlash('error')?></div>
  <?php endif; ?>

</div>