<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Funny Island</title>
</head>
<body>
<div id="app">
    <header>
        <ul>
            <li>About</li>
            <li class="active">Investors</li>
            <li>Careers</li>
            <li>Environment</li>
            <li>
                <span class="tablet">EN / SE / NO / FI</span>
                <span class="mobile">LANG: EN</span>
            </li>
        </ul>
    </header>
    <main>
        <section class="banner">
            <div>
                <h1>Funny Island</h1>
            </div>
        </section>
        <section class="content">
            <nav>
                <ul>
                    <li :class="{ active: currentTab === 'promotion' }" class="tab promotion"
                        @click="currentTab = 'promotion'"><i class="icon"></i><span>Promotion</span>
                    </li>
                    <li :class="{ active: currentTab === 'tickets' }" class="tab tickets"
                        @click="currentTab = 'tickets'"><i class="icon"></i><span>Tickets</span>
                    </li>
                    <li :class="{ active: currentTab === 'attractions' }" class="tab attractions"
                        @click="currentTab = 'attractions'"><i class="icon"></i><span>Attractions</span>
                    </li>
                    <li :class="{ active: currentTab === 'financial' }" class="tab financial"
                        @click="currentTab = 'financial'"><i class="icon"></i><span>Financial Report</span>
                    </li>
                    <li :class="{ active: currentTab === 'about' }" class="tab about" @click="currentTab = 'about'"><i
                                class="icon"></i><span>About Company</span>
                    </li>
                    <li :class="{ active: currentTab === 'careers' }" class="tab careers"
                        @click="currentTab = 'careers'"><i class="icon"></i><span>Careers</span>
                    </li>
                    <li :class="{ active: currentTab === 'events' }" class="tab events" @click="currentTab = 'events'">
                        <i class="icon"></i><span>Events & News</span>
                    </li>
                </ul>
            </nav>
            <section class="main">
                <article :class="{ active: currentTab === 'promotion' }" class="promotion">
                    <h1><i class="icon"></i>2 adults, 1 kid free promotion during December.</h1>
                    <img src="photos/photo-1460788150444-d9dc07fa9dba.jpg" alt="photo of kid swinging">
                </article>
                <article :class="{ active: currentTab === 'tickets' }" class="tickets">
                    <h1><i class="icon"></i>Tickets</h1>
                    <p>Amount of Guests</p>
                    <div class="counts">
                        <label v-for="(val, key) in tickets" :for="'count-' + key" :key="key">
                            <span>{{ key }}:</span>
                            <input type="number" :id="'count-' + key" min="0" max="10" step="1" v-model.number="tickets[key]">
                        </label>
                    </div>
                    <div class="ticket-list" v-for="(val, key) in tickets" :key="key">
                        <vticket v-for="i in val" :key="key + val + '-' + i" :type="key" :i="i" ></vticket>
                    </div>
                    <button @click="checkout">Checkout</button>
                </article>
                <article :class="{ active: currentTab === 'attractions' }" class="attractions">
                    <h1><i class="icon"></i>Attractions</h1>
                    <div class="attraction-container">
                        <div class="attraction">
                            <img src="photos/photo-1478369317562-3f92a3a9c9d6.jpg" alt="Enjoy the night.">
                            <p aria-hidden="true">Enjoy the night.</p>
                        </div>
                        <div class="attraction">
                            <img src="photos/photo-1454021108581-20ec63d13d55.jpg" alt="Park in birdview">
                            <p aria-hidden="true">Park in birdview</p>
                        </div>
                        <div class="attraction">
                            <img src="photos/photo-1471893300835-dff67e40e355.jpeg" alt="Crazy tower!">
                            <p aria-hidden="true">"Crazy tower!</p>
                        </div>
                        <div class="attraction">
                            <img src="photos/photo-1465779171454-aa85ccf23be6.jpg" alt="Roller coster">
                            <p aria-hidden="true">Roller coster</p>
                        </div>
                    </div>
                </article>
                <article :class="{ active: currentTab === 'financial' }" class="financial">
                    <h1><i class="icon"></i>Financial Report</h1>
                    <div class="stock">
                        <div class="info">
                            <p>FUNI as of 13:45, 1st December, 2016:</p>
                            <p>Pricing delayed by 15 min.</p>
                        </div>
                        <div class="stock-value">
                            {{ stockValue }}
                        </div>
                    </div>
                    <button>
                        <i class="download-arrow">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </i>
                        Download Q3 Financial Report
                    </button>
                </article>
                <article :class="{ active: currentTab === 'about' }" class="about">
                    <h1><i class="icon"></i>About Company</h1>
                    <p>We have 3 theme parks in Scandinavia.</p>
                    <ol>
                        <li @mouseover="cityHover('Stockholm')" @mouseout="resetHover">Stockholm</li>
                        <li @mouseover="cityHover('Gothernburg')" @mouseout="resetHover">Gothernburg</li>
                        <li @mouseover="cityHover('Oslo')" @mouseout="resetHover">Oslo</li>
                    </ol>
                    <div class="map" :class="activeCity"><?php require(__DIR__ . '/photos/AxG_Pixel_Europe.svg') ?></div>
                </article>
                <article :class="{ active: currentTab === 'careers' }" class="careers">
                    <h1><i class="icon"></i>Careers</h1>
                    <p>We have {{careers.length}} job openings.</p>
                    <div class="attraction-container" v-if="careers.length">
                        <div class="attraction" v-for="career of careers" :key="career.name">
                            <img :src="career.image" :alt="career.name">
                            <p aria-hidden="true">{{ career.name }}</p>
                        </div>
                    </div>
                    <p><b>Please send your cover letter and résumé via email: <a href="mailto:funnyisland@example.com">funnyisland@example.com</a>.</b></p>
                    <p><b><a href="#">Learn more about our benefits.</a></b></p>
                </article>
                <article :class="{ active: currentTab === 'events' }" class="events">
                    <h1><i class="icon"></i>Events & News</h1>
                    <div class="events">
                        <div class="event">
                            <div class="date">2016-12-01</div>
                            <div class="title">Upcoming theme park opening in Lisbon in 2018.</div>
                        </div>
                        <div class="event">
                            <div class="date">2016-11-28</div>
                            <div class="title">Christmas Party month</div>
                        </div>
                        <div class="event">
                            <div class="date">2016-11-25</div>
                            <div class="title">Q4 financial report to be announced on Feb 2017</div>
                        </div>
                        <div class="event">
                            <div class="date">2016-11-04</div>
                            <div class="title">Q3 financial report is ready</div>
                        </div>
                    </div>
                </article>
            </section>
        </section>
    </main>
    <div class="gem" :class="'gem-'+ gemState">
        <div class="gem-container" @click="gemClick">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
            <div class="dot dot-4"></div>
            <div class="dot dot-5"></div>
            <div class="dot dot-6"></div>
            <div class="dot dot-7"></div>
            <div class="dot dot-8"></div>
            <div class="gem-content">
                <div class="discount" v-if="gemState === 3">
                    <h2>Discount Code: {{ discount }}</h2>
                    <p>Awesome! You found a secret discount code in our website.</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>©2016, Funny Island Company. Attraction photos from Unsplash. Europe map from public domain.</p>
    </footer>
</div>
<script src="main.js"></script>
</body>
</html>