<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand">
            <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
        </a>
        
        <!-- Div for logged user items -->
        <?php if(currentUsers()): ?>
        <div class="logged_user" id="div_logged_user">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    <?php currentUsers();?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" type="button">Account</a>
                    <a class="dropdown-item" type="button">Another action</a>
                    <a class="dropdown-item" type="button" href="<?=PROOT?>register/logout">Logout</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </nav>

    <div class="container">	 	
        <form method="POST" action="upload.php" enctype ="multipart/form-data">
            <input type="hidden" name ="size" value="1000000">
            <div class= "form-group">
            <input type="text" class="form-control" placeholder = "Title" name="title">
            </div>
            <div class= "form-group">
                <select class="form-control" name= "category">
                    <option>Select Category</option>
                    <option>Vehicles</option>
                    <option>Cleaning appliences</option>
                    <option>Electrical/Electronic</option>
                    <option>Catering</option>
                    <option>Building and construction</option>
                    <option>Other</option>
                </select>
            </div>
            <div class= "form-group">
            <textarea name ="text" cols="50%" rows= "5" class="form-control" placeholder = "Discription"></textarea>
            </div>
            <div class= "form-group">
            <input type="file" class= "form-control" name="imge">
            </div>
            <div class= "form-group">
            <input type="submit" name="submit" class ="form-control" value="Upload">
            </div>
        </form>
    </div>
    
<?php $this->end(); ?>
