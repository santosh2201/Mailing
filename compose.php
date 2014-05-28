<div class="col-md-6" >
   <div style="float:right;magrin-bottom:10px">
      <span id="select"  style="margin-bottom:10px" src="">Select All </span>
      <input type="checkbox" onclick="toggle();" class="select_all" style="margin-left: 8px;" /> 
   </div>
   
   
   <?php
      //Get data from Apiary API and show it as a list
      $json = file_get_contents("https://patients.apiary.io/patients");
      $obj = json_decode($json);
      foreach ($obj->items as $item) {
      include 'views/tile.php';
      }
      ?>
</div>

<!-- Email form -->
<div class="col-md-6" >
   <form role="form" id="contact-form">
      <div class="form-group">
         <label for="email">
         Email
         </label>
         <input type="text" class="form-control" id="emailId" name="email" placeholder="email" readonly></input>
      </div>
      <div class="form-group">
         <label for="subject">
         Subject
         </label>
         <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
      </div>
      <div class="form-group">
         <label for="message">
         Message
         </label>
         <textarea class="form-control" id="message" name="message" rows="9">
         </textarea>
      </div>
      <button type="submit" class="btn btn-default" onclick="sendEmails()" id="submit">
      Submit
      </button>
      <button type="submit" class="btn btn-default" style="float:right" onclick="reset()" id="submit">
      Reset
      </button>
   </form>
</div>

<!-- Progress bar and number of messages text -->
<p style="margin-top:20px" id="temp_message"></p>
<div class="progress" style="margin-top:20px;display:none;">
   <div id="progress_bar" class="progress-bar" style="width: 0%;">
   </div>
</div>
