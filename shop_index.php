<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBoy Movies</title>

    <!-- link to favicon -->
    <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
    <!-- link to css -->
    <link rel="stylesheet" href="css//reset.css">
    <link rel="stylesheet" href="css/shop_css/main_shop.css">
    <link rel="stylesheet" href="css/shop_css/shop_index.css">

    <link rel="preload" as="image" href="img/shop_img/JoyBoy-background.png">
    <script src="js/shop_js/quick.js"></script>
</head>
<body>


    <!-- burger-menu -->
    <div class="burger-menu">
        <nav>
            <ul>
                <li><a href="#anime">Anime</a></li>
                <li><a href="#movie-gallery">Movies</a></li>
                <li><a href="#tvseries">TV Series</a></li>
            </ul>
        </nav>
        <div class="burger_search">
            <form action="#" method="post">
                <input type="text" class="search" placeholder="search the movie...">
                <button type="submit"><img src="icons/search.png" alt="search button"></button>
            </form>
        </div>
    </div>

    <!-- header -->
    <header class="header-main">
        <nav>
            <a href="shop_index.php" class="shop_logo">
                <img src="img/shop_img/joyboy_logo.jpg" alt="website logo">
            </a>

            <ul>
                <li><a href="#anime">Anime</a></li>
                <li><a href="#movie-gallery">Movies</a></li>
                <li><a href="#tvseries">TV Series</a></li>
            </ul>
        </nav>
        <div class="search">
            <form action="#" method="post">
                <input type="text" class="search" placeholder="search the movie...">
                <button type="submit" name="search"><img src="icons/search.png" alt="search button"></button>
            </form>
        </div>
        <div class="register">
            <a href="login.php" target="_blank"><div class="login">Log In</div></a>
            <a href="signup.php" target="_blank"><div class="singup">Sign Up</div></a>
        </div>

        <!-- burger-menu-btn -->
        <div class="burger-menu-btn"></div>
    </header>
    
    <!-- aside social-media -->
    <aside class="aside-sm">
        <a href="https://web.whatsapp.com/" target="_blank"><div class="a-whatsapp"></div></a>
        <a href="https://twitter.com/" target="_blank"><div class="a-x"></div></a>
        <a href="https://www.facebook.com/" target="_blank"><div class="a-facebook"></div></a>
        <a href="https://www.instagram.com/" target="_blank"><div class="a-instagram"></div></a>
        <a href="https://mail.google.com/" target="_blank"><div class="a-gmail"></div></a>
    </aside>

    <a href="#"><div class="toTop"  onclick="scrollToTop()" ></div></a>

    <!-- popup images -->
    <div id="moviePopupsContainer"></div>
    <div id="animePopupsContainer"></div>
    <div id="tvseriesPopupsContainer"></div>

    <!-- main -->
    <main>
        <section id="moving-gallery">
            <div class="moving-gallery-lr">
                <div class="moving-img img1">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img2">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img3">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img4">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img5">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img6">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img7">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img8">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img9">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img10">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img11">
                    <div><a href="#"></a></div>
                </div>
                <div class="moving-img img12">
                    <div><a href="#"></a></div>
                </div>
            </div>
        </section>

        <section id="movie-gallery" class="wrapper-gallery wrapper-main">
            <h2><a href="#movie-gallery">Movies</a> <img src="icons/watching-a-movie.png" alt="watching-movie icon"></h2>
            <div class="movie-img img1 popup-avengers_end_game">
                <div><a href="#">Avengers <br>End Game</a></div>
            </div>
            <div class="movie-img img2 popup-blue_beetle">
                <div><a href="#">Blue-Beetle</a></div>
            </div>
            <div class="movie-img img3 popup-captain_america">
                <div><a href="#">Captain America</a></div>
            </div>
            <div class="movie-img img4 popup-gran_turismo">
                <div><a href="#">Gran Turismo</a></div>
            </div>
            <div class="movie-img img5 popup-iron_man_3">
                <div><a href="#">Iron Man 3</a></div>
            </div>
            <div class="movie-img img6 popup-oppenheimer">
                <div><a href="#">Oppenheimer</a></div>
            </div>
            <div class="movie-img img7 popup-spider-man_no_way_home">
                <div><a href="#">Spider-Man <br>No Way Home</a></div>
            </div>
            <div class="movie-img img8 popup-transformers_rise_of_the_beasts">
                <div><a href="#">Transformers <br>Rise Of The Beasts</a></div>
            </div>
            <div class="movie-img img9 popup-uncharted">
                <div><a href="#">Uncharted</a></div>
            </div>
            <div class="movie-img img10 popup-venom">
                <div><a href="#">Venom</a></div>
            </div>
            <div class="movie-img img11 popup-mission_impossible_dead_reckoning">
                <div><a href="#">Mission Impossible <br> Dead Reckoning</a></div>
            </div>
            <div class="movie-img img12 popup-the_meg_2">
                <div><a href="#">The Meg 2</a></div>
            </div>
        </section>        
    </main>

    <section id="anime">
        <div  id="watch-anime" class="wrapper-anime wrapper-main">
            <h2><a href="#watch-anime">Anime</a> <img src="icons/watching-a-movie.png" alt="watching-movie icon"></h2>
            <div class="anime-img anime1 popup-attack_on_titan">
                <div><a href="#">Attack On Titan</a></div>
            </div>
            <div class="anime-img anime2 popup-black_clover">
                <div><a href="#">Black Clover</a></div>
            </div>
            <div class="anime-img anime3 popup-boruto">
                <div><a href="#">Boruto</a></div>
            </div>
            <div class="anime-img anime4 popup-demon_slayer">
                <div><a href="#">Demon Slayer</a></div>
            </div>
            <div class="anime-img anime5 popup-dragon_ball_super">
                <div><a href="#">Dragon Ball <br>Super</a></div>
            </div>
            <div class="anime-img anime6 popup-jujutsu_kaisen">
                <div><a href="#">Jujutsu Kaisen</a></div>
            </div>
            <div class="anime-img anime7 popup-naruto">
                <div><a href="#">Naruto</a></div>
            </div>
            <div class="anime-img anime8 popup-one_piece">
                <div><a href="#">One-Piece</a></div>
            </div>
            <div class="anime-img anime9 popup-seven_deadly_sins">
                <div><a href="#">Seven Deadly Sins</a></div>
            </div>
            <div class="anime-img anime10 popup-sword_art_online">
                <div><a href="#">Sword Art Online</a></div>
            </div>
            <div class="anime-img anime11 popup-That_Time_I_Got_Reincarnated_as_a_Slime">
                <div><a href="#">That Time I Got Reincarnated as a Slime</a></div>
            </div>
            <div class="anime-img anime12 popup-the_devil_is_a_part_timer">
                <div><a href="#">The Devil Is A Part Timer</a></div>
            </div>
        </div>

        <div id="tvseries"  class="wrapper-anime wrapper-main">
            <h2><a href="#tvseries">TV Series</a> <img src="icons/watching-a-movie.png" alt="watching-movie icon"></h2>
            <div class="series-img series1 popup-arrow">
                <div><a href="#">Arrow</a></div>
            </div>
            <div class="series-img series2 popup-game_of_thrones">
                <div><a href="#">Game Of Thrones</a></div>
            </div>
            <div class="series-img series3 popup-house_of_dragon">
                <div><a href="#">House Of Dragon</a></div>
            </div>
            <div class="series-img series4 popup-loki">
                <div><a href="#">Loki</a></div>
            </div>
            <div class="series-img series5 popup-Man_vs_Bee">
                <div><a href="#">Man Vs Bee</a></div>
            </div>
            <div class="series-img series6 popup-obi-wan_kenobi">
                <div><a href="#">Obi-Wan Kenobi</a></div>
            </div>
            <div class="series-img series7 popup-peaky_blinders">
                <div><a href="#">Peaky Blinders</a></div>
            </div>
            <div class="series-img series8 popup-the_flash">
                <div><a href="#">The Flash</a></div>
            </div>
            <div class="series-img series9 popup-the_lord_of_the_rings">
                <div><a href="#">The Lord Of The Rings</a></div>
            </div>
            <div class="series-img series10 popup-the_witcher">
                <div><a href="#">The Witcher</a></div>
            </div>
            <div class="series-img series11 popup-vikings">
                <div><a href="#">Vikings</a></div>
            </div>
            <div class="series-img series12 popup-wednesday">
                <div><a href="#">Wednesday</a></div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include_once "footer.php";?>
    
    <script src="js/shop_js/shop_index.js"></script>
    <script src="js/index.js"></script>
</body>
</html>