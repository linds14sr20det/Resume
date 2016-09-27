<template>
    <div class="container">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>Nucleic Games</h1>
            <p class="lead">An indie game studio building games we want to play. Hopefully you will too!</p>
            <p><a class="btn btn-lg btn-success" v-link="{ path: '/about'}" role="button">Our People</a></p>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Our Story</h2>
                <p>Nucleic Games is a small game studio based out of Edmonton, Alberta. We build stuff we like. It's just that simple.</p>
                <p>If you like how that sounds check back here. Some of our projects are big and ambitious, and some are small. Small projects are released free, usually on this site. If you like what we do, tweet at us! If you really like what we do, back us on Patreon!</p>
                <p>
                    <a class="btn btn-primary" href="https://twitter.com/nucliecgames" role="button"><i class="fa fa-twitter" style="font-size:1em"></i></a>
                    <a class="btn btn-primary disabled" href="#" role="button">Patreon &raquo;</a>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Current Projects</h2>
                <p>We are currently working on a major project, aiming for release late 2017. Imagine an oldschool twitch shooter mixed with some of your favourite side scrolling gameplay elements. We think you'll love it when you see it.</p>
                <p>If you're interested in learning more, check back here, or on Kickstarter, to back us and get access to our Alpha.</p>
                <p><a class="btn btn-primary disabled" href="#" role="button"> Coming Soon &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Browser Games</h2>
                <p>We build a few browser games every once and a while when we either want to test a new gameplay concept or a new technology. Try these out for free via the top menu.</p>
            </div>
        </div>
    </div>
</template>
