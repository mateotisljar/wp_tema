  </div> <!-- /.container -->
    <footer class="footer">
        <div class="footer-top-div">
            
        </div>
        <div class="footer-outer-div">
            <div class="footer-width">
                <div class="footer-first-div">
                    <div class="footer-social">
                        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img class="logo-img" src="'. esc_url( $logo[0] ) .'" height="';
                            echo get_custom_logo()->height ;
                            echo '" width="'. get_custom_logo()->width .'">';
                        } else {
                            echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
                        }
                        ?>
                        <div>
                            <h1 class="blog-title"><?php echo get_bloginfo( 'name' ); ?></h1>
                        </div><br>
                        <p>Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji. </p>
                        <img class="social-icons" src="http://icons.iconarchive.com/icons/danleech/simple/256/facebook-icon.png" alt="social">
                        <img class="social-icons" src="http://icons.iconarchive.com/icons/danleech/simple/1024/skype-icon.png" alt="social">
                        <img class="social-icons" src="https://didattica.polito.it/zxd/assets/img/png/linkedin.png" alt="social">
                        <img class="social-icons" src="http://1010wcsi.com/wp-content/uploads/2015/02/twitter_icon.png" alt="social">
                        <img class="social-icons" src="http://www.equator-network.org/wp-content/themes/equator/images/youtube-icon-20150302.png" alt="social">
                    </div>
                    <div class="footer-newslater">
                        <h1>Newslater</h1><br>
                        <p>Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji. </p>
                        <input type="text" placeholder="Your email">
                        <button>Subscribe</button>
                    </div>
                    <div class="footer-tags">
                        <h1>Tags Widget</h1><br>
                        <?php
                        $tags = get_tags();
                        ?>
                        <div class="tags-div">
                            <?php
                            foreach ( $tags as $tag ) {
                                $tag_link = get_tag_link( $tag->term_id );
                                ?>
                            <li><a href="<?php echo $tag_link; ?>"><?php echo $tag->name;?></a></li>
                              <?php  
                            }
                            ?> 
                        </div>
                    </div>
                </div><br>
                
                <?php 
                function GetFooterPosts($arg){
                    $myposts = get_posts($arg);
                    foreach($myposts as $post) :
                        setup_postdata($post); ?>
                        <a href="index.php?p=<?php echo $post->ID; ?>" >
                        <div class="footer-post-item">
                            <div>
                                <h2 class="footer-post-title"><?php echo $post->post_title; ?></h2>
                                <p class="footer-post-meta"><?php echo date('F d, Y', strtotime($post->post_date)); ?> </p>
                                <p class="footer-com"><img alt="comment-img" src="wp-content/themes/wp_tema/img/comment.png" class="comment-img"><?php echo ' '.$post->comment_count; ?></p><br>
                            </div>
                                <?php echo get_the_post_thumbnail($post->ID); ?>
                        </div></a><hr class="footer-post-line">
                    <?php endforeach; wp_reset_postdata(); 
                }
                
                
                ?>
                <div class="footer-second-div">
                    <div class="footer-featured">
                        <h1>Featured</h1>
                        <div class="f-posts">
        
                            <?php
                            $args = array('posts_per_page'=>3, 'orderby'=>'comment_count');
                            GetFooterPosts($args);
                            ?>
                        </div>
                    </div>
                    <div class="footer-radnom">
                        <h1>Random</h1>
                        <?php
                            $argss = array('posts_per_page'=>3, 'orderby'=>'rand');
                            GetFooterPosts($argss);
                            ?>
                    </div>
                    <div class="footer-twitter">
                        <h1>Twitter</h1>
                    </div>
                </div>
                
            </div>
            
        </div>
        <hr class="footer-line">
            <div class="footer-info">
                <p class="first-p">
                    &#169; - Kenaz Template - Made by Mateo Tišljar
                </p>
                <p class="second-p">
                    Typography - Templates - Contact Form - 404 Page
                </p>
            </div>
    </footer>
<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php wp_footer(); ?> 
  </body>
</html>