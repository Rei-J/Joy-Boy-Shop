<header class="profile_header">
        <nav>
            <div class="btn-aside-menu" onclick="asideMenu()"></div>
            <a href="profile.php" class="profile_logo">
                <img src="img/shop_img/joyboy_logo.jpg" alt="website logo">
            </a>
            <div class="profile_search">
                <form action="search.php" method="post">
                    <input type="text" class="search" name="search" placeholder="search">
                    <button type="submit"><img src="icons/search.png" alt="search button"></button>
                </form>
            </div>
            <div class="user_settings" onclick="userSettings()">
                <aside class="user_menu">
                    <ul>
                        <li><a href="profile.php" class="first"><?php output_email(); ?></a></li>
                        <li><a href="cart.php" class="cart_shop">Cart</a></li>
                        <li><a href="order.php" class="order_shop">Orders</a></li>
                        <li><a href="#" class="second">Username/Password</a></li>
                        <li><a href="#" class="third">Delete the Account</a></li>
                    </ul>
                    <form action="includes/logout.inc.php" method="post">    
                        <button class="logout-btn">Log Out</button>
                    </form>
                </aside>
            </div>
        </nav>
    </header>

    <div class="change_username" id="change_username">
        <div class="close_change_username"></div>
        <form action="includes/upd_name_pwd.php" method="post">
            <h2>change the username / password!</h2>
            <input type="text" name="name" class="name" placeholder="new username">
            <input type="password" name="pwd" class="pwd" placeholder="new password">
            <button type="submit" class="save-btn" name="save-btn">save</button>
        </form>
    </div>
<!-- the second one to delete the user account -->
    <div class="delete_user" id="delete_user">
        <div class="close_delete_user"></div>
        <form action="includes/delete_user.php" method="post">
            <h2>Delete the User Account!</h2>
            <input type="email" name="email" class="email" placeholder="email">
            <input type="password" name="pwd" class="pwd" placeholder="password">
            <button type="submit" class="save-btn" name="save-btn">delete</button>
        </form>
    </div>
<!-- -->
    <aside class="aside-menu">
        <ul>
            <li><span>Contact</span></li>
            <li><a href="https://www.facebook.com/" target="_blank"><div class="arranxhata"></div></a></li>
            <li><a href="https://www.instagram.com/" target="_blank"><div></div></a></li>
            <li><a href="https://web.whatsapp.com/" target="_blank"><div></div></a></li>
            <li><a href="https://twitter.com/" target="_blank"><div></div></a></li>
            <li><a href="https://mail.google.com/" target="_blank"><div></div></a></li>
            <li><a href="https://www.tiktok.com/" target="_blank"><div></div></a></li>
            <li><a href="https://www.linkedin.com/" target="_blank"><div></div></a></li>
        </ul>
        <div class="userlogin">
            <div class="ulogo"></div>
            <div class="uname"><h3><?php output_name(); ?></h3></div>
        </div>
    </aside>