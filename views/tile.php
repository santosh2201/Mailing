<?php
$details=array("id","name","mobile","email","dob");
$printDetails=array("ID","Name","Mobile","Email","DOB");
?>
<div class="person-container" style="width:100%;" id="<?php echo $item->$details[0]; ?>">
  <div class="col-md-4">
    <img style="width:125px;height:125px;" src="img/person.jpg">
  </div>
  <div class="col-md-8">
    <?php
      for($x=1;$x<5;$x++){ 
      if(strlen($item->$details[$x])){
           echo '<p class="person-container-text"
            id="'.$details[$x].'">'.$printDetails[$x].' : '.$item->$details[$x].'</p>';
      }} 
    ?>	
    <div class="checkbox" >
      <input type="checkbox"  class="check" value="<?php echo $item->$details[3] ?>" onclick="updateEmailAddress(this)">
      Check me out
    </input>
  </div>
</div>
</div>

