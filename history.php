<?php
   
   include 'model/mysql-connect.php';
     
     include 'model/get.php';
     	     while($row = mysqli_fetch_array($result)) {
     	$smallRecipients = $row['Recipients'];
     	if(strlen($row['Recipients'])>30){
     		$smallRecipients = substr($row['Recipients'], 0, 30)."...";
     	}
     	$smallSubject = $row['Subject'];
     	if(strlen($row['Subject'])>50){
     		$smallSubject = substr($row['Subject'], 0, 30)."...";
     	}elseif(strlen($row['Subject'])==0){
     		$smallSubject = '(no subject)';
     		$row['Subject'] = '(no subject)';
     	}
     	$smallMessage = $row['Message'];
     	if(strlen($row['Message'])>100){
     		$smallMessage = substr($row['Message'], 0, 100)."...";
     	}
     	//Display history tiles
       echo '<div class="col-md-12 history-tile" data-toggle="modal" data-target="#myModal" id="tile">';
       echo '<div class="col-md-3" id="Recipients">To : '.$row['Recipients'].'</div>';
       echo '<div class="col-md-2" id="Subject">'.$row['Subject'].'</div>';
       echo '<div class="col-md-7" id="Message">'.$row['Message'].'</div>';
       echo '</div>';
     }
     
     
     
     ?>
<!-- Modal displaying complete email -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="width:1000px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
         </div>
         <div class="modal-body">
            <p class="modal-recipient"></p>
            <p class="modal-message"></p>
         </div>
      </div>
   </div>
</div>
