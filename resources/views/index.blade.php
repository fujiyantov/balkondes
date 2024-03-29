<!doctype html>
<html>

<head>
    <base href="/" />
    <title>Lorem Ipsum Dolor Sit Amet</title>
    <meta property="og:site_name" content="Defend Bears Ears" />
    <meta property="og:title" content="Borobudur" />
    <meta property="og:url" content="http://bearsears.patagonia.com" />
    <meta property="og:description"
        content="Keep public lands in public hands. Protect Bears Ears National Monument and its millions of acres of world-class recreation, archeology, and culture." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://bearsears.patagonia.com/assets/share-action.jpg" />
    <meta name="name" content="Defend Bears Ears" />
    <meta name="url" content="http://bearsears.patagonia.com" />
    <meta name="twitter:title" content="Borobudur" />
    <meta name="twitter:url" content="http://bearsears.patagonia.com" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description"
        content="Keep public lands in public hands. Protect Bears Ears National Monument and its millions of acres of world-class recreation, archeology, and culture.">
    <meta name="twitter:image" content="http://bearsears.patagonia.com/assets/share.jpg">
    <meta name="description"
        content="Keep public lands in public hands. Protect Bears Ears National Monument and its millions of acres of world-class recreation, archeology, and culture." />
    <link rel="canonical" href="http://bearsears.patagonia.com" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-51286809-14', 'auto');
    </script>
    <link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/fc217058-e84c-4e07-8541-9de8b64d53a1.css" />
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/favicons/favicon.ico') }}" />
</head>

<body ng-class="{'is-mobile-chrome': isMobileChrome}">
    <header ng-class="{'is-visible': headerVisible, 'is-enabled': headerEnabled}" ng-controller="headerController"
        style="margin-top: 10px; margin-bottom: 10px">
        <div class="header--left" ng-class="{'is-hidden': experienceActive}">
            <a class="logo" href="#" title="Brand" ng-click="goHome($event)">
                <img src="{{ asset('/assets/icons/logo.png') }}" style="height:90px!important; margin-top: -20px;"
                    alt="Patagonia">
                <img src="{{ asset('/assets/icons/logo-kementrian.svg') }}"
                    style="height:90px!important; margin-top: -20px;" alt="Patagonia">
                <img src="{{ asset('/assets/icons/logo-kbkm.png') }}"
                    style="height:90px!important; margin-top: -20px;" alt="Patagonia">
            </a>
            <div class="breadcrumbs" ng-controller="breadcrumbController" ng-class="{'is-visible': showBreadcrumbs}">
                <a class="fade" ng-click="visit(crumb.link)" ng-repeat="crumb in crumbs">//crumb.name//</a>
            </div>
        </div>
        <div class="header--right" ng-class="{'is-hidden': experienceActive}">
            <a class="menu-open" ng-click="toggleMenu()"
                ng-class="{'is-inactive': (menuButton !== 'open'), 'is-active': isAtHome, 'is-takeaction': takeActionActive}">
                <div></div>
            </a>
            <a class="menu-share" href="gallery.html" target="_blank" style="margin-left: 75px!important;">GALLERY</a>
            <a class="menu-share" style="margin-left: 75px!important;">TRAVELLER</a>
            <a class="menu-takeaction" ng-click="visit('take-action')" ng-class="{'is-visible': !takeActionActive}">Take
                Action</a>
        </div>
        <a class="menu-home" ng-click="goHome($event)" ng-class="{'is-visible': experienceActive}">View the Full
            Site</a>
    </header>

    <div class="container">
        <div class="menu" ng-controller="menuController" ng-class="{'is-active': menuActive}">
            <div class="menu-main" ng-class="{'is-active': (active == 'main'), 'is-moving-between': movingBetween}">
                <div class="menuContainer">
                    @for ($i = 0; $i < 10; $i++)
                    <a href="#" class="menuItem">
                        <div class="menuItem-background">
                            <div style="background-image: url(/assets/cards/01_giritengah.jpg)"></div>
                        </div>
                        <div class="menuItem-content menuItem-content--base">
                            <div class="menuItem-meta">
                                <span class="menuItem-number">{{ $i }}</span>
                                <div class="menuItem-bar"></div>
                            </div>
                            <span class="menuItem-name">Lorem Ipsum</span>
                            <span class="menuItem-watched" ng-class="{'is-visible': item.watched}">Watched</span>
                        </div>

                        <div class="menuItem-content menuItem-content--hover">
                            <div class="menuItem-container">
                                <div class="menuItem-meta">
                                    <span class="menuItem-number">{{ $i }}</span>
                                    <div class="menuItem-bar"></div>
                                </div>
                                <span class="menuItem-name">Giritengah</span>
                                <p class="menuItem-description">Lorem Ipsum Dolor Sit Amet</p>
                                <div class="menuItem-link">Explore</div>
                                <div class="menuItem-link btn-gallery">Gallery</div>
                            </div>
                        </div>
                    </a>
                    @endfor
                    <div class="controls-map">
                        <a href="/map" class="controls-mapLink" ng-click="visit($event)">
                            <div class="controls-mapIcon"
                                ng-style="{'background-image': 'url(./assets/map/map-world.png)'}"></div>
                        </a>
                    </div>
                    <div class="menu-overlay"></div>
                    <div class="menuTitle">Borobudur<br /><span class="t-strikethrough">National Monument</span></div>
                </div>
            </div>
            {{-- <div class="menu-main" ng-class="{'is-active': (active == 'main'), 'is-moving-between': movingBetween}">
                <div class="menuContainer">
                    <a href="//'/' + item.id//" ng-click="visit($event)" class="menuItem" ng-repeat="item in main">
                        <div class="menuItem-background">
                            <div ng-if="isMobile"
                                ng-style="{'background-image': 'url(./assets/cards/mobile/' + item.content.image + ')'}">
                            </div>
                            <div ng-if="!isMobile"
                                ng-style="{'background-image': 'url(./assets/cards/' + item.content.image + ')'}"></div>
                        </div>
                        <div class="menuItem-content menuItem-content--base">
                            <div class="menuItem-meta">
                                <span class="menuItem-number">//item.content.number//</span>
                                <div class="menuItem-bar"></div>
                            </div>
                            <span class="menuItem-name">//item.content.name//</span>
                            <span class="menuItem-watched" ng-class="{'is-visible': item.watched}">Watched</span>
                        </div>

                        <div class="menuItem-content menuItem-content--hover">
                            <div class="menuItem-container">
                                <div class="menuItem-meta">
                                    <span class="menuItem-number">//item.content.number//</span>
                                    <div class="menuItem-bar"></div>
                                </div>
                                <span class="menuItem-name">//item.content.name//</span>
                                <p class="menuItem-description">//item.content.description//</p>
                                <div class="menuItem-link">//item.content.cta ? item.content.cta : 'Explore'//</div>
                                <div class="menuItem-link btn-gallery" style="z-index: 999999" >Gallery</div>
                            </div>
                        </div>
                    </a>
                    <div class="controls-map">
                        <a href="/map" class="controls-mapLink" ng-click="visit($event)">
                            <div class="controls-mapIcon"
                                ng-style="{'background-image': 'url(./assets/map/map-world.png)'}"></div>
                        </a>
                    </div>
                    <div class="menu-overlay"></div>
                    <div class="menuTitle">Borobudur<br /><span class="t-strikethrough">National Monument</span></div>
                </div>
            </div> --}}

            <div class="menu-full" ng-class="{'is-active': (active == 'full'), 'is-moving-between': movingBetween}"}">
                <div class="menu-arrow menu-arrow--left" ng-class="{'is-visible': showBack}">
                    <div class="menu-arrow-bg"></div>
                </div>
                <div class="menu-arrow menu-arrow--right" ng-class="{'is-visible': showForward}">
                    <div class="menu-arrow-bg"></div>
                </div>

                <div class="menuSections">
                    <a href="#" ng-repeat="item in main"
                        ng-class="{'menuSection--action' : $index == 2, 'is-active': section == $index}"
                        ng-click="move($index)">//item.content.name//
                    </a>
                    <div class="menuSections-overlay" ng-class="{'is-active': scrolled}"></div>
                </div>

                <div class="menuContainer" ng-click="close()">
                    <a class="menuItem" href="//'/' + item.id//" ng-click="visit($event)" ng-repeat="item in full"
                        ng-class="{'menuItem--firstTier' : item.level == 1}">
                        <div class="menuItem-background">
                            <div ng-if="isMobile"
                                ng-style="{'background-image': 'url(./assets/cards/mobile/' + item.content.image + ')'}">
                            </div>
                            <div ng-if="!isMobile"
                                ng-style="{'background-image': 'url(./assets/cards/' + item.content.image + ')'}">
                            </div>
                        </div>
                        <div class="menuItem-content menuItem-content--base">
                            <div class="menuItem-meta">
                                <span class="menuItem-number">//item.content.number//</span>
                                <span class="menuItem-type typeIcon--//type//"
                                    ng-repeat="type in item.content.icons"></span>
                                <div class="menuItem-bar"></div>
                            </div>
                            <span class="menuItem-name">//item.content.name//</span>
                            <span class="menuItem-watched" ng-class="{'is-visible': item.watched}">Watched</span>
                        </div>

                        <div class="menuItem-content menuItem-content--hover">
                            <div class="menuItem-container">
                                <div class="menuItem-meta">
                                    <span class="menuItem-number">//item.content.number//</span>
                                    <span class="menuItem-type typeIcon--//type//"
                                        ng-repeat="type in item.content.icons"></span>
                                    <div class="menuItem-bar"></div>
                                </div>
                                <span class="menuItem-name">//item.content.name//</span>
                                <p class="menuItem-description">//item.content.description//</p>
                                <div class="menuItem-link" href="//'/' + item.id//" ng-click="visit($event)">
                                    //item.content.cta ? item.content.cta : 'Explore'//</div>
                            </div>
                        </div>
                    </a>
                    <div class="menu-overlay"></div>
                </div>
            </div>
        </div>


        <section class="map" ng-controller="mapController" ng-class="{'is-active': showMap}">

            <div class="map-open" ng-click="toggleInfo()" ng-class="{'is-active': !showInfo}"></div>

            <div class="map-content" ng-class="{'is-active': showMap, 'is-info-active': showInfo}">
                <div class="map-close" ng-click="toggleInfo()"></div>
                <h1>Borobudur National Monument</h1>

                <p>
                    Borobudur, or Barabudur is a 9th-century Mahayana Buddhist temple in Magelang, Central Java,
                    Indonesia. It is the world's largest Buddhist temple. The temple has nine stacked platforms, six
                    square and three circular, topped by a central dome. It is decorated with 2,672 relief panels and
                    504 Buddha statues. The central dome is surrounded by 72 Buddha statues, each seated inside a
                    perforated Stupa.
                </p>

                <div class="map-legend">
                    <span class="legend-title">Explore the Map</span>
                    <div class="legend-item">
                        <span class="legend-icon legend-icon--sport"></span>
                        <span class="legend-label">Recreation</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon legend-icon--culture"></span>
                        <span class="legend-label">History & Culture</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon typeIcon--video"></span>
                        <span class="legend-label">Video</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon typeIcon--vrvideo"></span>
                        <span class="legend-label">360 Video</span>
                    </div>
                </div>
            </div>

            <div id="map-container" ng-class="{'is-active': showMap}"></div>

            <div class="custom-zoom">
                <div class="custom-zoom-in" ng-click="zoomIn()"></div>
                <div class="custom-zoom-out" ng-click="zoomOut()"></div>
            </div>

            <a class="card card--map" id="//place.id//" ng-repeat="place in places" href="//'/' + place.id//"
                ng-click="visit($event)" ng-class="{'is-active': ($parent.currentMarker.id == place.id)}"
                ng-style="{'background-image': 'url(./assets/cards/mobile/' + place.content.image + ')',
               'left': $parent.currentCoords.x, 'top': $parent.currentCoords.y}">
                <div class="card-icon typeIcon--//place.content.icons[0]//"></div>
                <div class="card-content">
                    <span class="card-label">//place.parent// //place.content.number//</span>
                    <span class="card-title">//place.content.name//</span>
                    <span ng-if="place.content.videoVR" class="card-cta">Explore 360 Video</span>
                    <span ng-if="!place.content.videoVR && (place.type == 'video')" class="card-cta">Explore
                        Video</span>
                    <span ng-if="(place.type == 'streetview')" class="card-cta">Explore Street View</span>
                    <span ng-if="(place.type == 'pano')" class="card-cta">Explore Panorama</span>
                </div>
                <div class="card-close" ng-click="hideCard($event)"></div>
            </a>

            <div class="map-shadow" ng-class="{'is-active': currentMarker}"></div>

        </section>


        <section class="intro" ng-controller="introController"
            ng-class="{'is-active': active, 'is-controls-visible': (controlActive && showControls || (currentState == 'paused'))}">
            <div class="intro-info" ng-class="{'is-active': (showLoading || showMeta), 'is-done': introEnded}">
                <div class="intro-loading" ng-class="{'is-active' : showLoading}">
                    <div class="loading-bear"></div>
                </div>
                <div class="intro-meta" ng-class="{'is-active': (showMeta && !showDoomsday)}">
                    <div class="meta-icons">
                        <div class="meta-sound"></div>
                        <div class="meta-vr"></div>
                    </div>
                    <div class="meta-buttons">
                        <a class="meta-experience" ng-click="goTo($event, 'experience')">Experience VR</a>
                        <a class="meta-skip" ng-click="goTo($event, 'home')"
                            ng-class="{'is-active': showMeta, 'is-visible': (showControls || (currentState == 'paused'))}">Skip</a>
                    </div>
                </div>
            </div>

            <div class="intro-video intro-video--preview" style="pointer-events: auto !important"
                ng-class="{'is-active': (showVideo && showPreview), 'is-done': introEnded}">
                <div id="intro-preview"></div>
            </div>

            <div class="intro-video"
                ng-class="{'is-active': (showVideo && !showPreview), 'is-blurred': blur, 'is-done': introEnded}"
                ng-click="playPause()">
                <div id="intro-video"></div>
            </div>

            <div class="intro-preview" ng-class="{'is-active': (showPreview && showMeta), 'is-done': introEnded}">
                <div class="title" ng-class="{'is-active': showPreviewTitle}">
                    <div><span>Borobudur</span></div>
                    <div class="t-smallcaps t-strikethrough">National Monument</div>
                </div>

                <div class="intro-play" ng-click="playPause()" ng-class="{'is-active': showPlayButton}">
                    <div class="controls-playPauseToggle is-play-btn"></div>
                    <div class="t-smallcaps">Play</div>
                </div>
            </div>

            <div class="intro-doomsday overlay has-background" ng-class="{'is-active': doomsday && showDoomsday}">
                <div class="overlay-container">
                    <h1>The President Stole Bears Ears National Monument</h1>
                    <p>In an illegal move, the president just reduced the size of Bears Ears and Grand
                        Staircase-Escalante National Monuments. This is the largest elimination of protected land in
                        American history.</p>
                    <a class="doomsday-button" ng-click="goTo($event, 'take-action')">Defend the land you have
                        left.</a>
                </div>

                <a class="doomsday-skip" ng-click="skipDoomsday()">Continue to the site</a>
            </div>

            <div class="intro-titles" ng-class="{'is-active': !showPreviewTitle, 'is-done': introEnded}">
                <div class="title title--by" ng-class="{'is-active': activeTitle == 0 || activeTitle == 1}">
                    <img src="{{ asset('/assets/icons/logo-kbkm.png') }}" width="500" alt="Patagonia">Presents
                </div>
                <div class="title title--final" ng-class="{'is-active': activeTitle == 2}">Borobudur <span
                        class="t-strikethrough">National Monument</span></div>
            </div>

            <div class="controls"
                ng-class="{'is-active': controlActive, 'is-forced-open': (currentState == 'paused'), 'is-visible': showControls}">
                <div class="controls-playPauseToggle" ng-class="{'is-play-btn': (currentState !== 'playing')}"
                    ng-click="playPause()"></div>

                <div class="controls-scrubber" be-mousedown="pauseScrubber($event)"
                    be-mousemove="updateScrubber($event)" be-mouseup="seekTo(timeCurrent)">
                    <div class="controls-scrubberTrack">
                        <div class="controls-scrubberProgress" ng-style="{'width': scrubberWidth + '%'}"></div>
                    </div>
                </div>

                <div class="controls-time">
                    <span class="controls-timeCurrent" ng-bind="(timeCurrent | minutesFilter)"></span>
                    <span class="controls-timeTotal" ng-bind="(timeTotal | minutesFilter)"></span>
                </div>

                <div class="controls-muteToggle" ng-class="{'is-unmute-btn': isMuted}" ng-click="toggleMute()"></div>
            </div>
        </section>


        <section class="takeaction" ng-controller="takeactionController"
            ng-class="{'is-active': active, 'is-menu-open': isMenuOpen}">
            <div class="takeaction--gradient" ng-class="{'is-visible': (showGradient && active)}"></div>
            <div class="takeaction--callout" ng-class="{'is-active': active}">
                <div class="takeaction-bg"></div>
                <h1>Take<br />Action</h1>
                <p><strong>Public lands have never been more threatened than right now.</strong></p>
                <p>&nbsp;</p>
                <p>The fate of our national monuments is in the hands of the Trump administration. Public lands—from
                    Maine to Hawai’i—provide enormous cultural, ecological and recreational value, and they are at risk.
                    Removing protections for these wild places to open them up for development will not make us energy
                    independent, and history shows that when states control these lands, they are sold to the highest
                    bidder. This is not a chance we are willing to take.</p>
                <p>&nbsp;</p>
                <p><strong>Defend the land you have left.</strong></p>
                <p class="footnote"><strong>Powered by <a href="http://phone2action.com"
                            target="_blank">Phone2Action</a></strong></p>
            </div>

            <div class="takeaction--form" ng-class="{'is-active': active}">
                <div class="takeaction-formintro">
                    <h2>The President Stole Bears Ears National Monument</h2>
                    <p>In an illegal move, the president just reduced the size of Bears Ears and Grand
                        Staircase-Escalante National Monuments. This is the largest elimination of protected land in
                        American history.</p>
                    <p>&nbsp;</p>
                    <p>Tell the Administration that they don’t have the authority to take these lands away from you.</p>
                </div>
                <div class="advocacy-actionwidget" data-domain="p2a.co" data-shorturl="3lXjOXB"
                    data-responsive="true"></div>
            </div>
        </section>

        <section class="credits" ng-controller="creditsController"
            ng-class="{'is-active': active, 'is-menu-open': isMenuOpen}">
            <div class="overlay">
                <div class="overlay-container">
                    <div class="overlay-number">Bears Ears</div>
                    <h1 class="overlay-name">Credits</h1>
                    <div class="credits">
                        <div class="credits-column">
                            <div class="credits-group">
                                <strong>Presented By</strong>
                                <p><a target="_blank" class="credits-imagelink" href="http://patagonia.com">
                                        <img class="credits-logo" src="{{ asset('/assets/icons/patagonia_logo.svg') }}"
                                            alt="Patagonia"></a></p>
                            </div>

                            <div class="credits-group">
                                <strong>Photography</strong>
                                <p>Josh Ewing</p>
                                <p>Andrew Burr</p>
                                <p>Matthew Van Biene</p>
                                <p>Randall Tate</p>
                                <p>Marc Toso</p>
                            </div>
                        </div>

                        <div class="credits-column">
                            <div class="credits-group">
                                <strong><a target="_blank" href="http://www.ducttapethenbeer.com/">Duct Tape Then
                                        Beer</a> Team</strong>
                                <p>Becca Cahall</p>
                                <p>Fitz Cahall</p>
                                <p>Isaiah Branch – Boyle</p>
                                <p>Mario Quintana</p>
                                <p>Amy Stolzenbach</p>
                            </div>

                            <div class="credits-group">
                                <strong>Special Thanks</strong>
                                <p>Josh Ewing</p>
                                <p>Ron Hunter</p>
                                <p>Gavin Noyes</p>
                                <p>Cynthia Wilson</p>
                                <p>Vaughn Hadenfeldt</p>
                                <p>Marcia Hadenfeld</p>
                                <p>Amanda Podmore</p>
                            </div>
                        </div>

                        <div class="credits-column">
                            <div class="credits-group">
                                <strong>Design and Development</strong>
                                <p><a href="http://upperquad.com" target="_blank">Upperquad</a></p>
                            </div>

                            <div class="credits-group">
                                <strong>Technology Partners</strong>
                                <p>Sandy Russell</p>
                                <p>Karen Tuxen-Bettman</p>
                                <p>Sarah Steele</p>
                                <p>Wayne Thai</p>
                            </div>

                            <div class="credits-group">
                                <strong>And the</strong>
                                <p>Google Maps Team</p>
                            </div>
                        </div>

                        <div class="credits-column">
                            <div class="credits-group">
                                <strong>Featuring</strong>
                                <p>Tommy Caldwell</p>
                                <p>Brady Robinson</p>
                                <p>Kitty Calhoun</p>
                                <p>Andrew Burr</p>
                                <p>Steve Fassbinder</p>
                                <p>Luke Nelson</p>
                                <p>Dawn Glanc</p>
                                <p>Willie Grayeyes</p>
                                <p>Jason Nez</p>
                                <p>Lyle Balenquah</p>
                                <p>Riley Balenquah</p>
                                <p>Malcolm Lehi</p>
                                <p>Octavius Seowtewa</p>
                                <p>Davis Filfred</p>
                                <p>Mary Jane Yazzie</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="stage"></div>


    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{ asset('/js/vendor/videojs/video.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/threejs/three.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/videojs/videojs-panorama.v5.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/kmlmap/KmlMapParser.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        $('.btn-gallery').on('click', function() {
            alert('gallery hello')
        })
    </script>
</body>

</html>
