<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-nav">
        <ul>
            <li id="popular" class="side-hover">
                <a>Popular</a>
            </li>
            <li id="top-rated" class="side-hover">
                <a>Top Rated</a>
            </li>
            <li id="comments" class="side-hover">
                <a>Comments</a>
            </li>
        </ul>
    </div>
    <div class="sidebar-posts">
        <?php
        $args= array('posts_per_page' => 15);
        GetSidebarPosts($args);
        ?>
        
    </div>
    <div class="top-rated">
        <?php
        $args2 = array( 'meta_key' => 'ratings_average', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page'=>15);
        GetSidebarPosts($args2);    
        ?>
    </div>
    <div class="comment-side">
        <?php
        $args3 = array('posts_per_page'=>15, 'orderby'=>'comment_count');
        GetSidebarPosts($args3);    
        ?>
    </div>
    <div class="sidebar-module">
        <h1>Social</h1>
        <div class="social-networks">
            <a href="#">
                <div class="facebook">
                    <div class="facebook-in">
                        <img class="facebook-icon" src="http://icons.iconarchive.com/icons/danleech/simple/256/facebook-icon.png" alt="social">
                        <h2>Like</h2>
                    </div>
                    <div class="facebook-sub">
                        <h3>
                           0 likes
                        </h3>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="twitter">
                    <div class="twitter-in">
                        <img class="twitter-icon" src="http://1010wcsi.com/wp-content/uploads/2015/02/twitter_icon.png" alt="social">
                        <h2>Follow</h2>
                    </div>
                    <div class="twitter-sub">
                        <h3>
                            0 Followers
                        </h3>
                    </div>
                </div>
            </a>
            <a href="http://youtube.com/channel/UCILKPbOAKQgecx7apymoWaA?sub_confirmation=1">
                <div class="youtube">
                    <div class="youtube-in">
                        <img class="youtube-icon" src="http://www.equator-network.org/wp-content/themes/equator/images/youtube-icon-20150302.png" alt="social">
                        <h2>Subscribe</h2>
                    </div>
                    <div class="youtube-sub">
                        <h3>
                            <?php 
                                $channel = 'http://youtube.com/channel/UCILKPbOAKQgecx7apymoWaA/';
                                $t = file_get_contents($channel);
                                $pattern = '/yt-uix-tooltip" title="(.*)" tabindex/';
                                preg_match($pattern, $t, $matches, PREG_OFFSET_CAPTURE);
                                echo $matches[1][0] . " subscribers";

                                ?>
                        </h3>
                    </div>
                </div>
            </a>
        </div>
         
    </div>
    <div class="sidebar-module">
    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fplavatvornica&tabs=timeline&width=400&height=600&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="400" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
    
</div><!-- /.blog-sidebar -->