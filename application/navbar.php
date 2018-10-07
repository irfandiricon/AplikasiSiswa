<font size="2" face="Century Gothic">
    <nav class="navbar navbar-inverse" style="margin-bottom:2px;">
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href='?page=home' data-path="home" data-menu="Home" class="menu-application index.php">
                        <font size="2">Home</font>
                    </a>
                </li>
                <li>
                    <a href='?page=tentang-kami' data-path="tentang-kami" data-menu="About Us" class="menu-application index.php">
                        <font size="2">Tentang Kami</font>
                    </a>
                </li>
                <li>
                    <a href='?page=cara-pendaftaran' data-path="cara-pendaftaran" data-menu="Cara Pendaftaran" class="menu-application index.php">
                        <font size="2">Cara Pendaftaran</font>
                    </a>
                </li>
                <li>
                    <a href='?page=hubungi-kami' data-path="hubungi-kami" data-menu="Hubungi Kami" class="menu-application index.php">
                        <font size="2">Hubungi Kami</font>
                    </a>
                </li>
                <?php
                    if($user_id!=""){
                ?>
                <li>
                    <a href='<?php echo $app;?>'>
                        <font size="2">Form E-ABK</font>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if($user_id==""){
                ?>
                <li>
                    <a href='../login'>
                        <font size="2">Login</font>
                    </a>
                </li>
                <?php
                    }else{
                ?>
                <li>
                    <a href='../logout.php'>
                        <font size="2">Logout</font>
                    </a>
                </li>
              <?php } ?>
            </ul>
        </div>
    </nav>
</font>
