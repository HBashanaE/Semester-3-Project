<?php $this->start('body'); ?> 
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand">
            <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
        </a>
        <!-- Div for generel user items -->
        <?php if(!currentUsers()): ?>
        <div class="generel_user" id="div_generel_user">

            <div class="row">
                <!-- Login form -->
                <form method="post" name="login"  action="<?=PROOT?>register/login" class="form-inline " style="content-right">
                    <input type="text" name="username" class="form-control mr-sm-2" placeholder="Username or email" required>
                    <input type="password" name="password" class="form-control mr-sm-2" placeholder="Password" required>
                    <button type="submit" name="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0" value="login">
                        Login</button>
                </form>
                <!-- Register button -->
                <form action="<?=PROOT?>register/login">
                    <input type="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0" value="Register" />
                </form>
            </div>
            <div class="row">
                <label for="remember_me">Remember Me <input type="checkbox" name="remember_me" value="on"></label>
            </div>
        </div>
        <?php endif; ?>
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
                    <a class="dropdown-item" type="button" href="logout.php">Logout</a>
                </div>
                <button type="button" class="btn btn-warning"><a href="<?=PROOT?>advertisement/index">Post AD</a></button>
            </div>
        </div>
        <?php endif; ?>
    </nav>
<?php $this->end(); ?>