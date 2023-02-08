<html>
 
   <head> 
      <title>Upload Form</title> 
   </head>
	
   <body> 
    <center>
    <div class="form-group mt-3">
        <h2 class="mb-5">UPLOAD IMAGE</h2>

      <?php
      echo form_open_multipart('upload/do_upload');?> 
      <form action = "" method = "">
        <select name="object"class="form-select w-25 p-3 "  >
        <?php foreach ($objet as $obj) { ?>
            <option value="<?php echo $obj['id']?>"><?php echo $obj['name']?></option>
        <?php } ?>
        </select>
         <input   class="form-control w-25 p-3 mt-5" type = "file" name = "userfile" size = "20" id="formfile" /> 
         <br /><br /> 
         <input type = "submit" value = "upload" class="btn btn-secondary mb-5"/> 
      </form> 
      </div>	
    </center>

   </body>
	
</html>