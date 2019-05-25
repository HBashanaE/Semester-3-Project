<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div>	 	
    <form method="POST" action="upload.php" enctype ="multipart/form-data">
    <input type="hidden" name ="size" value="1000000">
    <div >
        
        <select type = "text" name= "category">
            <option>Select Category</option>
            <option>Vehicles</option>
            <option>Cleaning appliences</option>
            <option>Electrical/Electronic</option>
            <option>Catering</option>
            <option>Building and construction</option>
            <option>Other</option>
        </select>
    </div>
 <div>
 <textarea name ="text" cols="40" rows= "4" class="form-input" placeholder = "Discription"></textarea>
 </div>
 <div class= "form-group">
 <input type="file" class= "form-submit" name="myimage">
 </div>
 <div class= "form-group">
 <input type="submit" name="submit_image" class ="form-submit" value="Upload">
 </div>
 </div>
</form>
<?php $this->end(); ?>
