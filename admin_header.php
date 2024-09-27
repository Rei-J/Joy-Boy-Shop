<header class="header">
   <a href="admin_index.php" class="logo">Admin<span>Panel</span></a>

   <nav class="navbar">
      <a href="admin_index.php">Dashboard</a>
      <a href="admin_products.php">products</a>
      <a href="admin_orders.php">orders</a><!-- order, ursers, message -->
   </nav>
   
   <div class="user_settings" onclick="aduserSettings()">
      <aside class="user_menu">
         <ul>
            <li><a href="admin_index.php" class="first"><?php output_ad_name(); ?></a></li>
            <li><a href="admin_index.php" class="second"><?php output_ad_email(); ?></a></li>
            <li><a href="#" class="third">Username/Password</a></li>
            <li><a href="#" class="forth">Delete the Account</a></li>
         </ul>
         <form action="admin_includes/ad_logout.inc.php" method="post">    
            <button class="logout-btn">Log Out</button>
         </form>
      </aside>
   </div>
</header>

<div class="change_username" id="change_username">
        <div class="close_change_username"></div>
        <form action="admin_includes/upd_adname_adpwd.php" method="post">
            <h2>change the username / password!</h2>
            <input type="text" name="name" class="name" placeholder="new username">
            <input type="password" name="pwd" class="pwd" placeholder="new password">
            <button type="submit" class="save-btn" name="save-btn">save</button>
        </form>
    </div>
<!-- the second one to delete the user account -->
    <div class="delete_user" id="delete_user">
        <div class="close_delete_user"></div>
        <form action="admin_includes/ad_delete_user.php" method="post">
            <h2>Delete the User Account!</h2>
            <input type="email" name="email" class="email" placeholder="email">
            <input type="password" name="pwd" class="pwd" placeholder="password">
            <button type="submit" class="save-btn" name="save-btn">delete</button>
        </form>
    </div>

