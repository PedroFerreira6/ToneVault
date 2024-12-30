 <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/home" class="logo">
                        <img src="app/assets/images/logo/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/home" <?php if(!isset($local))echo 'class="active"'; ?> >Inicio</a></li>
                        <li><a href="/search" <?php if(isset($local) && $local==1)echo 'class="active"' ?> >Search</a></li>
                        <li><a href="/upload" <?php if(isset($local) && $local==2)echo 'class="active"' ?> >Upload</a></li>
                        <li><a href="/profile" <?php if(isset($local) && $local==3)echo 'class="active"' ?>>Profile</a></li>
                        <li><a href="/wallet" <?php if(isset($local) && $local==4)echo 'class="active"' ?>>Wallet</a></li>
                        <li><a href="/logout" style="background-color:#C62300;color:white">logout</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->