<?php include 'views/header.php'; ?>

<!-- Tabs -->
<ul class="nav nav-tabs">
   <li class="active"><a href="#compose" data-toggle="tab">Compose</a></li>
   <li><a href="#history" data-toggle="tab">History</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
   <div class="tab-pane active" id="compose">
      <?php include 'compose.php'; ?>
   </div>
   <div class="tab-pane" id="history">
      <?php include 'history.php'; ?>
   </div>
</div>

<?php include 'views/footer.php'; ?>
