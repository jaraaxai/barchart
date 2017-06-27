<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('quotes/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('quotes/index') ?>">Back to list</a>
          <input class="add-btn" type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['symbol']->renderLabel() ?></th>
        <td>
          <?php echo $form['symbol']->renderError() ?>
          <?php echo $form['symbol'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_price']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_price']->renderError() ?>
          <?php echo $form['last_price'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['prichange']->renderLabel() ?></th>
        <td>
          <?php echo $form['prichange']->renderError() ?>
          <?php echo $form['prichange'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['pctchange']->renderLabel() ?></th>
        <td>
          <?php echo $form['pctchange']->renderError() ?>
          <?php echo $form['pctchange'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['volume']->renderLabel() ?></th>
        <td>
          <?php echo $form['volume']->renderError() ?>
          <?php echo $form['volume'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
