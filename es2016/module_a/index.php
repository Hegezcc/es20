<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Funny Island</title>
</head>
<body>
<div id="app">
<header id="header">
    <nav>
        <ul>
            <li>About</li>
            <li class="active">Investors</li>
            <li>Careers</li>
            <li>Environment</li>
            <li><span class="tablet">EN / SE / NO / FI</span><span class="phone">LANG: EN</span></li>
        </ul>
    </nav>
    <section id="hero">
        <h1>Funny Island</h1>
    </section>
</header>
<main id="app">
    <nav id="main-nav">
        <ul>
            <li class="promotion" :class="{ active: active === 'promotion' }" @click="active = 'promotion'">Promotion</li>
            <li class="tickets" :class="{ active: active === 'tickets' }" @click="active = 'tickets'">Tickets</li>
            <li class="attractions" :class="{ active: active === 'attractions' }" @click="active = 'attractions'">Attractions</li>
            <li class="financial" :class="{ active: active === 'financial' }" @click="active = 'financial'">Financial Report</li>
            <li class="about" :class="{ active: active === 'about' }" @click="active = 'about'">About Company</li>
            <li class="careers" :class="{ active: active === 'careers' }" @click="active = 'careers'">Careers</li>
            <li class="events" :class="{ active: active === 'events' }" @click="active = 'events'">Events & News</li>
        </ul>
    </nav>
    <section id="pages">
        <article class="page" id="promotion" :class="{ active: active === 'promotion' }">
            <h2>2 adults, 1 kid free promotion during December.</h2>
            <img src="/media/photos/photo-1460788150444-d9dc07fa9dba.jpg" alt="kid swinging">
        </article>
        <article class="page" id="tickets" :class="{ active: active === 'tickets' }">
            <h2>Tickets and Admission</h2>
            <p>Amount of Guests</p>
            <div class="guest-counts">
                <label v-for="(val, key) in guestTypes" :for="'amount-' + key" :key="key">
                    <span>{{ key }}</span>
                    <input type="number" v-model.number="guestTypes[key]" :id="'amount-' + key" min="0" max="10" step="1">
                </label>
            </div>
            <form class="tickets" action="/form-handler.php" method="POST">
                <v-ticket v-for="t of showTickets" :key="t.id" :i.sync="t" @fastpass="fastpassCount++"></v-ticket>
                <input type="submit" value="Checkout and Confirm the tickets">
            </form>
        </article>
        <article class="page" id="attractions" :class="{ active: active === 'attractions' }">
            <h2>Attractions</h2>

            <div class="gallery">
                <figure>
                    <img src="/media/photos/photo-1478369317562-3f92a3a9c9d6.jpg" alt="Enjoy the night.">
                    <figcaption>Enjoy the night.</figcaption>
                </figure>
                <figure>
                    <img src="/media/photos/photo-1454021108581-20ec63d13d55.jpg" alt="Park in birdview">
                    <figcaption>Park in birdview</figcaption>
                </figure>
                <figure>
                    <img src="/media/photos/photo-1471893300835-dff67e40e355.jpeg" alt="Crazy tower!">
                    <figcaption>Crazy tower!</figcaption>
                </figure>
                <figure>
                    <img src="/media/photos/photo-1465779171454-aa85ccf23be6.jpg" alt="Roller coaster">
                    <figcaption>Roller coaster</figcaption>
                </figure>
            </div>
        </article>
        <article class="page" id="financial" :class="{ active: active === 'financial' }">
            <h2>Financial Report</h2>

            <div class="stock">
                <div class="price">${{ stock.price }}</div>
                <div class="info">
                    <p>FUNI as of {{ stock.time }}:</p>
                    <p>Pricing delayed by 15 min.</p>
                </div>
            </div>
            <div class="download">
                <a href="#" class="button">
                <span class="arrow">
                    <span v-for="i in 10" class="dot" :class="[ 'dot-' + i ]" :key="i"></span>
                </span>
                    Download Q3 Financial Report
                </a>
            </div>
        </article>
        <article class="page" id="about" :class="{ active: active === 'about' }">
            <h2>About Company</h2>
            <p>We have 3 theme parks in Scandinavia.</p>
            <ol>
                <li class="Stockholm" :class="{ active: city === 'Stockholm' }" @mouseover="city = 'Stockholm'" @mouseout="city = null">Stockholm</li>
                <li class="Gothenburg" :class="{ active: city === 'Gothenburg' }" @mouseover="city = 'Gothenburg'" @mouseout="city = null">Gothenburg</li>
                <li class="Oslo" :class="{ active: city === 'Oslo' }" @mouseover="city = 'Oslo'" @mouseout="city = null">Oslo</li>
            </ol>
            <div class="map" :class="[ city ]"><?php require(__DIR__ . '/media/AxG_Pixel_Europe.svg') ?></div>
        </article>
        <article class="page" id="careers" :class="{ active: active === 'careers' }">
            <h2>Careers</h2>
            <p>We have 5 jobs opening.</p>
            <div class="gallery">
                <figure v-for="c of careers" :key="c.name">
                    <img :src="c.image" :alt="c.name">
                    <figcaption>{{ c.name }}</figcaption>
                </figure>
            </div>

            <div class="info">
                <p>Please send your cover letter and résumé via email: <a href="mailto:funnyisland@example.com">funnyisland@example.com</a>.</p>
                <p><a href="#">Learn more about our benefits.</a></p>
            </div>
        </article>
        <article class="page" id="events" :class="{ active: active === 'events' }">
            <h2>Events & News</h2>
            <ul>
                <li class="event">
                    <span class="time">2016-12-01</span>
                    <h3>Upcoming theme park opening in Lisbon in 2018.</h3>
                    <a href="#">Read more...</a>
                </li>
                <li class="event">
                    <span class="time">2016-11-28</span>
                    <h3>Christmas Party month</h3>
                    <a href="#">Read more...</a>
                </li>
                <li class="event">
                    <span class="time">2016-11-25</span>
                    <h3>Q4 financial report to be announced on Feb 2017</h3>
                    <a href="#">Read more...</a>
                </li>
                <li class="event">
                    <span class="time">2016-11-04</span>
                    <h3>Q3 financial report is ready</h3>
                    <a href="#">Read more...</a>
                </li>
            </ul>
        </article>
    </section>
</main>
<section id="discount">
    <div class="gem" :class="'state-' + discountState" @click="discountClick">
        <div v-for="i in 7" class="color" :class="'color-' + i"></div>
        <div class="color color-8">
            <div class="discount-found" v-if="code !== null">
                <h2>Discount Code: {{ code }}</h2>
                <p>Awesome! You found a secret discount code in our website.</p>
            </div>
        </div>
    </div>
</section>
<footer>
    <p>©2016, Funny Island Company. Attraction photos from Unsplash. Europe map from public domain.</p>
</footer>
</div>
<script src="/js/main.js"></script>
</body>
</html>