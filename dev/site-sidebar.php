<section data-class="ba-site-sidebar" class="ba-container ba-site-sidebar">
    <div class="ba-site-sidebar-welcome">
        <h5 class="ba-site-sidebar-welcome-heading">Welcome to Archbald!</h5>
        <div class="ba-site-sidebar-welcome-message">
            <p>You can use this site to learn more about our town, or keep up with local news and events. Don't forget to sign up for email updates below!</p>
        </div>

        <form class="ba-email-signup">
            <input type="text" placeholder="Enter your email to sign up" />
            <button type="submit">Submit</button>
        </form>
    </div>

    <nav data-class="ba-primary-navigation" class="ba-primary-navigation">
    <?php wp_nav_menu( array('menu' => 'Primary', 'container' => '' , 'menu_class' => 'cp-primary-navigation-list')); ?>              
    </nav>


    <div class="ba-social">
        <a href="http://www.facebook.com/archbaldborough">
            <span class="ba-social-like">Like Our Page</span>
            <span>facebook.com/archbaldborough</span>
        </a>
    </div>
</section>