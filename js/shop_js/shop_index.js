//burger-menu shop_index btn open/close
let burgerBtn = document.querySelector(".burger-menu-btn");
let burgerMenu = document.querySelector(".burger-menu");
let asideMedia = document.querySelector(".aside-sm");
let getToTopBtn = document.querySelector(".toTop");

let isBurgerOpen = false;

burgerBtn.onclick = function(){
    if(!isBurgerOpen){
        burgerMenu.style.display = "block";
        burgerBtn.style.backgroundPosition = "center left 5rem, center";
        asideMedia.style.display = "none";
        getToTopBtn.style.display = "none";
        isBurgerOpen = true;
    }else if(isBurgerOpen){
        burgerMenu.style.display = "none";
        burgerBtn.style.backgroundPosition = "center, center left 5rem";
        asideMedia.style.display = "flex";
        getToTopBtn.style.display = "block";
        isBurgerOpen = false;
    }
}

//close burger-menu when a link is clicked

document.querySelectorAll(".burger-menu a").forEach(function(link){
    link.addEventListener("click", function(){
        burgerMenu.style.display = "none";
        burgerBtn.style.backgroundPosition = "center, center left 5rem";
        asideMedia.style.display = "flex";
        getToTopBtn.style.display = "block";
        isBurgerOpen = false;
    });
});


// popup movies/anime/tvseries
// Movies
document.addEventListener("DOMContentLoaded", function () {
    function setupMoviePopup(popupSelector, imgContainerSelector) {
        let popupMovie = document.querySelector(popupSelector);
        let fullImgContainer = document.querySelector(imgContainerSelector);
        let closeBtn = fullImgContainer.querySelector("span");

        popupMovie.addEventListener("click", function () {
            fullImgContainer.style.display = "flex";
        });

        closeBtn.addEventListener("click", function () {
            fullImgContainer.style.display = "none";
        });
    }

    function generateMoviePopup(movie) {
        return `
            <div id="${movie.id}" class="full-img">
                <img src="${movie.imagePath}" alt="full-image">
                <span>X</span>
                <div class="review">
                    <h2>${movie.title} (${movie.year})</h2>
                    <p>${movie.synopsis}</p>
                    <br>
                    <p>${movie.genre}<br>Actors: ${movie.actors}</p>
                    <div class="rating">
                        <div class="star"></div>
                        <p>${movie.rating}</p>
                    </div>
                </div>
            </div>
        `;
    }

    let movies = [
        {
            id: 'avengers_end_game',
            title: 'Avengers: End Game',
            year: 2019,
            synopsis: 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos\' actions and restore balance to the universe. ',
            genre: 'Action/Adventure/Drama',
            actors: 'Benedict Cumberbatch, Chris Evans, Chris Hemsworth, Jeremy Renner, Mark Ruffalo, Robert Downey Jr., Scarlett Johansson, Tom Holland',
            rating: '8.4/10',
            imagePath: 'img/shop_img/movies/avengers end game.jpg'
        },
        {
            id: 'blue_beetle',
            title: 'blue beetle',
            year: 2023,
            synopsis: 'An alien scarab chooses Jaime Reyes to be its symbiotic host, bestowing the recent college graduate with a suit of armor that\'s capable of extraordinary powers, forever changing his destiny as he becomes the superhero known as Blue Beetle.',
            genre: 'Action/ Adventure/ Sci-Fi',
            actors: 'Becky G, Bruna Marquezine, Xolo Maridueña',
            rating: '6.0/10',
            imagePath: 'img/shop_img/movies/blue-beetle.jpg'
        },
        {
            id: 'captain_america',
            title: 'captain america',
            year: 2011,
            synopsis: 'Steve Rogers, a rejected military soldier, transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a warmonger and a terrorist organization.',
            genre: 'Action/ Adventure/ Sci-Fi',
            actors: 'Chris Evans, Hugo Weaving, Samuel L. Jackson, Tommy Lee Jones',
            rating: '6.9/10',
            imagePath: 'img/shop_img/movies/captain america.jpg'
        },
        {
            id: 'gran_turismo',
            title: 'gran turismo',
            year: 2023,
            synopsis: 'Based on the unbelievable, inspiring true story of a team of underdogs - a struggling, working-class gamer, a failed former race car driver, and an idealistic motorsport exec - who risk it all to take on the most elite sport in the world.',
            genre: 'Action/ Adventure/ Drame',
            actors: 'Archie Madekwe, David Harbour, Orlando Bloom',
            rating: '7.2/10',
            imagePath: 'img/shop_img/movies/gran turismo.jpg'
        },
        {
            id: 'iron_man_3',
            title: 'iron man 3',
            year: 2013,
            synopsis: 'When Tony Stark\'s world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.',
            genre: 'Action/ Adventure/ Sci-Fi',
            actors: 'Don Cheadle, Guy Pearce, Gwyneth Paltrow, Robert Downey Jr.',
            rating: '7.1/10',
            imagePath: 'img/shop_img/movies/iron man 3.jpg'
        },
        {
            id: 'oppenheimer',
            title: 'oppenheimer',
            year: 2023,
            synopsis: 'The story of American scientist, J. Robert Oppenheimer, and his role in the development of the atomic bomb.',
            genre: 'Biography/ Drama/ History',
            actors: 'Cillian Murphy, Emily Blunt, Matt Damon',
            rating: '8.5/10',
            imagePath: 'img/shop_img/movies/oppenheimer.jpg'
        },
        {
            id: 'spider-man_no_way_home',
            title: 'spider-man: no way home',
            year: 2021,
            synopsis: 'With Spider-Man\'s identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.',
            genre: 'Action/ Adventure/ Fantasy',
            actors: 'Alfred Molina, Benedict Cumberbatch, Jamie Foxx, Tom Holland, Willem Dafoe, Zendaya',
            rating: '8.2/10',
            imagePath: 'img/shop_img/movies/spider-man no way home.jpg'
        },
        {
            id: 'transformers_rise_of_the_beasts',
            title: 'transformers: rise of the beasts',
            year: 2023,
            synopsis: 'During the \'90s, a new faction of Transformers - the Maximals - join the Autobots as allies in the battle for Earth.',
            genre: 'Action/ Adventure/ Sci-Fi',
            actors: 'Anthony Ramos, Dominique Fishback, Luna Lauren Velez',
            rating: '6.1/10',
            imagePath: 'img/shop_img/movies/transformers rise of the beasts.jpg'
        },
        {
            id: 'uncharted',
            title: 'uncharted',
            year: 2022,
            synopsis: 'Street-smart Nathan Drake is recruited by seasoned treasure hunter Victor "Sully" Sullivan to recover a fortune amassed by Ferdinand Magellan, and lost 500 years ago by the House of Moncada.',
            genre: 'Action/ Adventure',
            actors: 'Mark Wahlberg, Sophia Ali, Tom Holland',
            rating: '6.3/10',
            imagePath: 'img/shop_img/movies/uncharted.jpg'
        },
        {
            id: 'venom',
            title: 'venom',
            year: 2021,
            synopsis: 'Eddie Brock attempts to reignite his career by interviewing serial killer Cletus Kasady, who becomes the host of the symbiote Carnage and escapes prison after a failed execution.',
            genre: 'Action/ Sci-Fi/ Thriller',
            actors: 'Michelle Williams, Stephen Graham, Tom Hardy, Woody Harrelson',
            rating: '5.9/10',
            imagePath: 'img/shop_img/movies/venom.jpg'
        },
        {
            id: 'mission_impossible_dead_reckoning',
            title: 'mission impossible: dead reckoning',
            year: 2023,
            synopsis: 'Ethan Hunt and his IMF team must track down a dangerous weapon before it falls into the wrong hands.',
            genre: 'Action/ Adventure/ Thriller',
            actors: 'Hayley Atwell, Simon Pegg, Tom Cruise, Ving Rhames',
            rating: '7.8/10',
            imagePath: 'img/shop_img/movies/mission impossible dead reckoning.jpg'
        },
        {
            id: 'the_meg_2',
            title: 'the meg 2',
            year: 2023,
            synopsis: 'A research team encounters multiple threats while exploring the depths of the ocean, including a malevolent mining operation.',
            genre: 'Action/ Adventure/ Horror',
            actors: 'Cliff Curtis, Jason Statham, Jing Wu, Shuya Sophia Cai',
            rating: '5.1/10',
            imagePath: 'img/shop_img/movies/the meg 2.jpg'
        }
    ];

    let moviePopupsContainer = document.getElementById('moviePopupsContainer');

    movies.forEach(movie => {
        let moviePopupHTML = generateMoviePopup(movie);
        moviePopupsContainer.insertAdjacentHTML('beforeend', moviePopupHTML);
        setupMoviePopup(`.popup-${movie.id}`, `#${movie.id}`);
    });
});
// Anime
document.addEventListener("DOMContentLoaded", function(){
    function setupAnimePopup(popupSelector, imgContainerSelector){
        let popupAnime = document.querySelector(popupSelector);
        let fullImgContainer = document.querySelector(imgContainerSelector);
        let closeBtn = fullImgContainer.querySelector("span");

        popupAnime.addEventListener("click", function(){
            fullImgContainer.style.display = "flex";
        });

        closeBtn.addEventListener("click", function(){
            fullImgContainer.style.display = "none";
        });
    }

    function generateAnimePopup(anime){
        return `
            <div id="${anime.id}" class="full-img">
                <img src="${anime.imagePath}" alt="full-image">
                <span>X</span>
                <div class="review">
                    <h2>${anime.title} (${anime.year})</h2>
                    <p>${anime.synopsis}</p>
                    <br>
                    <p>${anime.genre}</p>
                    <div class="rating">
                        <div class="star"></div>
                        <p>${anime.rating}</p>
                    </div>
                </div>
            </div>
        `;
    }

    let animes = [
        {
            id: 'attack_on_titan',
            title: 'attack on titan',
            year: 2013,
            synopsis: 'Centuries ago, mankind was slaughtered to near extinction by monstrous humanoid creatures called titans, forcing humans to hide in... ',
            genre: 'Action/ Mystery/ Drama/ Fantasy/ Shounen/ Super Power/ Military',
            rating: '8.5/10',
            imagePath: 'img/shop_img/anime/attack on titan.jpg'
        },
        {
            id: 'black_clover',
            title: 'black clover',
            year: 2017,
            synopsis: 'Asta and Yuno were abandoned at the same church on the same day. Raised together as children, they came to know of the "Wizard... ',
            genre: 'Action/ Comedy/ Fantasy/ Magic/ Shounen',
            rating: '7.2/10',
            imagePath: 'img/shop_img/anime/black clover.jpg'
        },
        {
            id: 'boruto',
            title: 'boruto',
            year: 2017,
            synopsis: 'Following the successful end of the Fourth Shinobi World War, Konohagakure has been enjoying a period of peace, prosperity, and... ',
            genre: 'Action/ Adventure/ Martial Arts/ Shounen/ Super Power',
            rating: '6.6/10',
            imagePath: 'img/shop_img/anime/boruto.jpg'
        },
        {
            id: 'demon_slayer',
            title: 'demon slayer',
            year: 2019,
            synopsis: 'Ever since the death of his father, the burden of supporting the family has fallen upon Tanjirou Kamado\'s shoulders. Though living... ',
            genre: 'Action/ Demons/ Historical/ Shounen/ Supernatural',
            rating: '8.5/10',
            imagePath: 'img/shop_img/anime/demon slayer.jpg'
        },
        {
            id: 'dragon_ball_super',
            title: 'dragon ball: super',
            year: 2015,
            synopsis: 'Seven years after the events of Dragon Ball Z, Earth is at peace, and its people live free from any dangers lurking in the... ',
            genre: 'Action/ Adventure/ Comedy/ Fantasy/ Martial Arts/ Shounen/ Super Power',
            rating: '7.4/10',
            imagePath: 'img/shop_img/anime/dragon ball super.jpg'
        },
        {
            id: 'jujutsu_kaisen',
            title: 'jujutsu kaisen',
            year: 2020,
            synopsis: 'Idly indulging in baseless paranormal activities with the Occult Club, high schooler Yuuji Itadori spends his days at either the... ',
            genre: 'Action/ Demons/ Horror/ School/ Shounen/ Supernatural',
            rating: '8.1/10',
            imagePath: 'img/shop_img/anime/jujutsu kaisen.jpg'
        },
        {
            id: 'naruto',
            title: 'naruto',
            year: 2007,
            synopsis: 'It has been two and a half years since Naruto Uzumaki left Konohagakure, the Hidden Leaf Village, for intense training following... ',
            genre: 'Action, Adventure, Comedy, Martial Arts, Shounen, Super Power',
            rating: '8.1/10',
            imagePath: 'img/shop_img/anime/naruto.jpg'
        },
        {
            id: 'one_piece',
            title: 'one-piece',
            year: 1999,
            synopsis: 'Gold Roger was known as the "Pirate King," the strongest and most infamous being to have sailed the Grand Line. The capture and... ',
            genre: 'Action, Adventure, Comedy, Drama, Fantasy, Shounen, Super Power',
            rating: '8.6/10',
            imagePath: 'img/shop_img/anime/one-piece.jpg'
        },
        {
            id: 'seven_deadly_sins',
            title: 'seven deadly sins',
            year: 2014,
            synopsis: 'In a world similar to the European Middle Ages, the feared yet revered Holy Knights of Britannia use immensely powerful magic to... ',
            genre: 'Action, Adventure, Ecchi, Fantasy, Magic, Shounen, Supernatural',
            rating: '7.9/10',
            imagePath: 'img/shop_img/anime/seven deadly sins.jpg'
        },
        {
            id: 'sword_art_online',
            title: 'sword art online',
            year: 2012,
            synopsis: 'In the year 2022, virtual reality has progressed by leaps and bounds, and a massive online role-playing game called Sword Art... ',
            genre: 'Action, Adventure, Fantasy, Game, Romance, Isekai',
            rating: '7.3/10',
            imagePath: 'img/shop_img/anime/sword art online.jpg'
        },
        {
            id: 'That_Time_I_Got_Reincarnated_as_a_Slime',
            title: 'That Time I Got Reincarnated as a Slime',
            year: 2018,
            synopsis: 'Thirty-seven-year-old Satoru Mikami is a typical corporate worker, who is perfectly content with his monotonous lifestyle in Tokyo... ',
            genre: 'Action, Adventure, Comedy, Demons, Fantasy, Magic, Shounen, Isekai',
            rating: '8.0/10',
            imagePath: 'img/shop_img/anime/That Time I Got Reincarnated as a Slime.jpg'
        },
        {
            id: 'the_devil_is_a_part_timer',
            title: 'the devil is a part timer',
            year: 2013,
            synopsis: 'Striking fear into the hearts of mortals, the Demon Lord Satan begins to conquer the land of Ente Isla with his vast demon armies... ',
            genre: 'Comedy, Demons, Fantasy, Romance, Supernatural, Isekai',
            rating: '7.8/10',
            imagePath: 'img/shop_img/anime/the devil is a part timer.jpg'
        }
    ];

    let animePopupsContainer = document.getElementById('animePopupsContainer');

    animes.forEach(anime => {
        let animePopupHTML = generateAnimePopup(anime);
        animePopupsContainer.insertAdjacentHTML('beforeend', animePopupHTML);
        setupAnimePopup(`.popup-${anime.id}`, `#${anime.id}`);
    });

});
// TV Series
document.addEventListener("DOMContentLoaded", function () {
    function setupTVSeriesPopup(popupSelector, imgContainerSelector) {
        let popupTVSeries = document.querySelector(popupSelector);
        let fullImgContainer = document.querySelector(imgContainerSelector);
        let closeBtn = fullImgContainer.querySelector("span");

        popupTVSeries.addEventListener("click", function () {
            fullImgContainer.style.display = "flex";
        });

        closeBtn.addEventListener("click", function () {
            fullImgContainer.style.display = "none";
        });
    }

    function generateTVSeriesPopup(serie) {
        return `
            <div id="${serie.id}" class="full-img">
                <img src="${serie.imagePath}" alt="full-image">
                <span>X</span>
                <div class="review">
                    <h2>${serie.title} (${serie.year})</h2>
                    <p>${serie.synopsis}</p>
                    <br>
                    <p>${serie.genre}<br>Actors: ${serie.actors}</p>
                    <div class="rating">
                        <div class="star"></div>
                        <p>${serie.rating}</p>
                    </div>
                </div>
            </div>
        `;
    }

    let series = [
        {
            id: 'arrow',
            title: 'arrow',
            year: 2012,
            synopsis: 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow. ',
            genre: 'Action/ Adventure/ Crime',
            actors: 'Stephen Amell, David Ramsey, Emily Bett Rickards, Echo Kellum, Rick Gonzalez, Juliana Harkavy...',
            rating: '7.5/10',
            imagePath: 'img/shop_img/series/arrow.jpg'
        },
        {
            id: 'game_of_thrones',
            title: 'game of thrones',
            year: 2011,
            synopsis: 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for a millennia.',
            genre: 'Action/ Adventure/ Drama',
            actors: 'Emilia Clarke, Peter Dinklage, Kit Harington, Lena Headey, Sophie Turner, Maisie Williams...',
            rating: '9.2/10',
            imagePath: 'img/shop_img/series/game of thrones.jpg'
        },
        {
            id: 'house_of_dragon',
            title: 'house of dragon',
            year: 2022,
            synopsis: 'An internal succession war within House Targaryen at the height of its power, 172 years before the birth of Daenerys Targaryen.',
            genre: 'Action/ Adventure/ Drama',
            actors: 'Rhys Ifans, Matt Smith, Graham Mc Tavish, Fabien Frankel, Steve Toussaint, Eve Best...',
            rating: '8.5/10',
            imagePath: 'img/shop_img/series/house of dragon.jpg'
        },
        {
            id: 'loki',
            title: 'loki',
            year: 2023,
            synopsis: 'The mercurial villain Loki resumes his role as the God of Mischief in a new series that takes place after the events of “Avengers: Endgame.”',
            genre: 'Action/ Adventure/ Fantasy',
            actors: 'Tom Hiddleston, Owen Wilson, Sophia Di Martino, Wunmi Mosaku, Gugu Mbatha-Raw, Eugene Cordero...',
            rating: '8.2/10',
            imagePath: 'img/shop_img/series/loki.jpg'
        },
        {
            id: 'Man_vs_Bee',
            title: 'Man vs Bee',
            year: 2022,
            synopsis: 'A man finds himself at war with a bee while housesitting a luxurious mansion. Who will win, and what irreparable damage will be done in the process?',
            genre: 'Short/ Comedy/ Family',
            actors: 'Rowan Atkinson, Claudie Blakley, Jing Lusi, Julian Rhind-Tutt, Tom Basden, India Fowler...',
            rating: '6.7/10',
            imagePath: 'img/shop_img/series/Man vs Bee.jpg'
        },
        {
            id: 'obi-wan_kenobi',
            title: 'obi-wan kenobi',
            year: 2022,
            synopsis: 'Jedi Master Obi-Wan Kenobi has to save young Leia after she is kidnapped, all the while being pursued by Imperial Inquisitors and his former Padawan, now known as Darth Vader.',
            genre: 'Action/ Adventure/ Sci-Fi',
            actors: 'Ewan McGregor, Moses Ingram, Vivien Lyra Blair, Hayden Christensen, Sung Kang, Rupert Friend...',
            rating: '7.1/10',
            imagePath: 'img/shop_img/series//obi-wan kenobi.jpg'
        },
        {
            id: 'peaky_blinders',
            title: 'peaky blinders',
            year: 2013,
            synopsis: 'A gangster family epic set in 1900s England, centering on a gang who sew razor blades in the peaks of their caps, and their fierce boss Tommy Shelby.',
            genre: 'Crime/ Drama',
            actors: 'Cillian Murphy, Paul Anderson, Joe Cole, Annabelle Wallis, Helen McCrory, Finn Cole...',
            rating: '8.8/10',
            imagePath: 'img/shop_img/series/peaky blinders.jpg'
        },
        {
            id: 'the_flash',
            title: 'the flash',
            year: 2014,
            synopsis: 'After being struck by lightning, Barry Allen wakes up from his coma to discover he\'s been given the power of super speed, becoming the Flash, and fighting crime in Central City.',
            genre: 'Action/ Adventure/ Drama',
            actors: 'Grant Gustin, Candice Patton, Danielle Panabaker, Carlos Valdes, Jesse L.Martin, Tom Cavanagh...',
            rating: '7.5/10',
            imagePath: 'img/shop_img/series/the flash.jpg'
        },
        {
            id: 'the_lord_of_the_rings',
            title: 'the lord of the rings',
            year: 2022,
            synopsis: 'Epic drama set thousands of years before the events of J.R.R. Tolkien\'s \'The Hobbit\' and \'The Lord of the Rings\' follows an ensemble cast of characters, both familiar and new, as they confro...',
            genre: 'Action/ Adventure/ Drama',
            actors: 'Morfydd Clark, Mike Wood, Ismael Cruz Cordova, Charlie Vickers, Markella Kavenagh, Megan Richards...',
            rating: '7.0/10',
            imagePath: 'img/shop_img/series/the lord of the rings.jpg'
        },
        {
            id: 'the_witcher',
            title: 'the witcher',
            year: 2019,
            synopsis: 'Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.',
            genre: 'Action/ Adventure/ Drama',
            actors: 'Freya Allan, Henry Cavill, Anya Chalotra, Eamon Farren, Mimi Ndiweni, MyAnna Buring...',
            rating: '8.0/10',
            imagePath: 'img/shop_img/series/the witcher.jpg'
        },
        {
            id: 'vikings',
            title: 'vikings',
            year: 2013,
            synopsis: 'Vikings transports us to the brutal and mysterious world of Ragnar Lothbrok, a Viking warrior and farmer who yearns to explore--and raid--the distant shores across the ocean.',
            genre: 'Action/ Adventure/ Drama',
            actors: 'Travis Fimmel, Alex Hogh Andersen, Alexander Ludwig, Jordan Patrick Smith, Marco Ilso, Katheryn Winnick...',
            rating: '8.5/10',
            imagePath: 'img/shop_img/series/vikings.jpg'
        },
        {
            id: 'wednesday',
            title: 'wednesday',
            year: 2022,
            synopsis: 'Follows Wednesday Addams\' years as a student, when she attempts to master her emerging psychic ability, thwart a killing spree, and solve the mystery that embroiled her parents.',
            genre: 'Comedy/ Crime/ Fantasy',
            actors: 'Jenna Ortega, Emma Myers, Hunter Doohan, Percy Hynes White, Joy Sunday, Georgie Farmer...',
            rating: '8.1/10',
            imagePath: 'img/shop_img/series/wednesday.jpg'
        }
    ];

    let tvseriesPopupsContainer = document.getElementById('tvseriesPopupsContainer');

    series.forEach(serie => {
        let moviePopupHTML = generateTVSeriesPopup(serie);
        tvseriesPopupsContainer.insertAdjacentHTML('beforeend', moviePopupHTML);
        setupTVSeriesPopup(`.popup-${serie.id}`, `#${serie.id}`);
    });
});
