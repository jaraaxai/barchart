<form action="<?php echo url_for('quotes/search')?>" method="POST">
  <input class="addsymbol" type="text" placeholder="Enter a symbol" name="keyword">
  <input class="add-btn" type="submit" value="Add symbol">
</form>
<table id="myTable" class="tablesorter">
  <thead>
    <tr>
      <th>Symbol</th>
      <th>Symbol Name</th>
      <th>Last Price</th>
      <th>Change</th>
      <th>%Change</th>
      <th>Volume</th>
      <th>Time</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody id="tableBody">
  <?php if(count($quotess) > 0) :?>
    <?php foreach ($quotess as $quotes): ?>
    <tr>
      <td><?php echo $quotes->getSymbol() ?></td>
      <td><?php echo $quotes->getName() ?></td>
      <td class="bar"><?php echo $quotes->getLastPrice() ?></td>
      <td class="bar">
        <?php if($quotes->getPrichange() == 0):?>
          unch
        <?php else:?>
          <?php echo $quotes->getPrichange() ?>
        <?php endif;?>
      </td>
      <td class="bar">
        <?php if($quotes->getPctchange() == 0):?>
          unch
        <?php else:?>
          <?php echo $quotes->getPctchange() ?>%
        <?php endif;?>
      </td>
      <td class="bar"><?php echo $quotes->getVolume() ?></td>
      <td class="bar"><?php echo date('m/d/Y', strtotime($quotes->getTradetime())) ?></td>
      <td class="gol">
        <a href="#" onclick="remove(this, <?php echo $quotes->getId() ?>);">
        <img src="/images/icons/close.png">  
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  <?php else:?>
    <tr>
      <td colspan="8">
        <div id="messages">
          <div class="error">There are no symbols in your watchslist, please add one</div>
        </div>
      </td>
    </tr>
  <?php endif?>
  </tbody>
</table>


<script type="text/javascript">
  $(document).ready(function() 
    { 
        $("#myTable").tablesorter({ headers: { 7: {sorter: false} } });
    } 
  ); 

  function remove(_this, _id){
    $.ajax({
        type: 'GET',
        url: '/barchart.php/quotes/delete/id/' + _id,
        success: function(data)
        {
          $( _this ).parent().parent().remove();
          var x = document.getElementById("myTable").rows.length;
          if( x == 1 ){
            $('#tableBody').append('<tr><td colspan="8"><div id="messages"><div class="error">There are no symbols in your watchslist, please add one</div></div></td></tr>');
          }
        }
      });
    
  }


</script>