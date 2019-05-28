

<?php 
    //require_once(PROOT.'core/'.'Input.php');
    $this->start('body'); ?>
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

    <!-- Search section -->
    <section class="search-sec">
        <div class="container">
            <form id="searchForm" action="<?=PROOT?>home/search/" method="POST">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-sm-12 p-2">
                                <input id="searchField" type="text" name="query" class="form-control search-slt" placeholder="What do you want?" required>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 p-2">
                                <select class="form-control search-slt" name="category" id="selectCategory" placeholder="Select Category">
                                    <option>All</option>
                                    <option>Vehicles</option> <!-- 00 -->
                                    <option>Cleaning appliences</option> <!-- 01 -->
                                    <option>Electrical/Electronic</option> <!-- 02 -->
                                    <option>Catering</option> <!-- 03 -->
                                    <option>Building and construction</option> <!-- 04 -->
                                    <option>Other</option> <!-- 99 -->
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-2 ">
                                <!-- <button type="button" value="Search" class="btn btn-primary wrn-btn">Search</button> -->
                                <input type="submit" class="btn btn-info active align-items-center" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div>
    <?php
        $db=mysqli_connect("localhost" , "root", "", "login");
        $sql= "SELECT * FROM ads";
        $result= mysqli_query($db,$sql);
        while ($row=mysqli_fetch_array($result)){
            if ($row['approve']=='approve'){
                echo "<div class= 'container'>"; 
            echo "<div class = 'card mb-3' style='height: 500px; width:90%;'>";
                echo "<img src='myimage/".$row['image']."'class ='card-img-top img-responsive' alt = 'Responsive image' style ='width : auto ; height:400px;'>";
                echo "<div class='card-body'>";
                echo '<h5 class="card-title">Test Ad</h5>';
                echo '<p class="card-text">This is ad description.</p>';
                echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo"</br>";
        }
    }

    ?>
    </div>
    <div class="card mb-3" style="height: 500px; width:90%;">
        <img src="Resources/kuliyata_logo_full.png" class="card-img-top img-responsive" style="width: auto; height: 100%"; alt="...">
        <div class="card-body">
            <h5 class="card-title">Test Ad</h5>
            <p class="card-text">This is ad description.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>

    <!-- Floating button -->
    <?php if(currentUsers()): ?>
    <div>
        <a href="<?=PROOT?>advertisement/post" class="float" style="position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0275d8 ;
	color:#FFF;
	border-radius:10px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;" data-toggle="tooltip" data-placement="left" title="Post an ad">
            <i class="fa fa-plus my-float" style="margin-top:22px;" ></i>  
        </a>
    </div>
    <?php endif; ?>

    <!-- Floating button -->
<?php $this->end(); ?>