<?php

function wp_tema_setup(){
    $args = array(
        'default-image'      => get_template_directory_uri() . '/img/default.jpg',
        'default-text-color' => '000',
        'width'              => 700,
        'height'             => 120,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'wp_tema_setup' );

function wp_custom_logo_setup() {
    $defaults = array(
        'height'      => 50,
        'width'       => 50,
        'max-width'   => 50,
        'max-height'   => 50,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'wp_custom_logo_setup' );

add_theme_support( 'post-thumbnails' ); 

add_filter('the_content', 'put_thumbnail_in_posting');
function put_thumbnail_in_posting($content) {
    global $post;
    if ( has_post_thumbnail() && ( $post->post_type == 'post' ) ) { the_post_thumbnail( ); }
    return $content;
}
apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' );

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
function custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            
            <div class="back-link"><?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
            
            <div class="comment-data">
                <div class="comment-first">
                    <?php echo get_avatar($comment->comment_author_email, 50);?>
                    <h3><?php echo $comment->comment_author;?></h3>
                    <p class="comment-date"><?php echo date('M jS, Y H:i', strtotime($comment->comment_date));?></p>
                    <div class="reply">
                        <?php 
                        comment_reply_link( array_merge( $args, array( 
                        'reply_text' => 'Reply',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'] 
                        ) ) ); ?>
                    </div>
                </div>
                <br>
                <div class="comment-tekst">
                    <?php comment_text(); ?>
                </div>
                
            </div>
        <?php // End the default styling of comment
        break;
    endswitch;
}
function GetSlider(){
    ?>
    <div class="div-slider">
        <a class="w3-btn-floating w3-display-left" ><span>&#10094;</span></a>
        <a class="w3-btn-floating w3-display-right" ><span>&#10095;</span></a>
        <?php
            $mypostss = get_posts(array('posts_per_page' => 5, 'orderby'=>'date'));
            foreach($mypostss as $postt){
                setup_postdata($postt);
                ?>
                <div class="">
                    <h2><?php echo $postt->post_title; ?></h2>
                    <p class="date"><?php echo date('F d, Y', strtotime($postt->post_date));?></p>
                    <p class="com"><img alt="comment-img" src="wp-content/themes/wp_tema/img/comment.png" class="comment-img"><?php echo ' '.$postt->comment_count ." comments" ?></p><br>
                    <?php echo get_the_post_thumbnail($postt->ID); ?>
                    <li><a class="read-more" href="index.php?p=<?php echo $postt->ID; ?>">Read article</a></li><br>
                </div>
                <?php } 
                wp_reset_postdata();
                ?>
    </div>
    <?php 
} 
   
function GetPosts($args, $className){
    $posts = get_posts($args);
    foreach($posts as $post){
        setup_postdata($post);
        ?>
        <div class="<?php echo $className.'-posts'; ?>">
            <a href="index.php?p=<?php echo $post->ID; ?>" title="<?php the_title_attribute(); ?>">
                <div class="<?php echo $className.'-post';?>">
                    <?php echo get_the_post_thumbnail($post->ID); ?>
                    <p class="blog-post-meta"><?php echo date('F d, Y', strtotime($post->post_date)); ?> </p>
                    <p class="com-post"><img alt="comment-img" src="wp-content/themes/wp_tema/img/comment.png" class="comment-img"><?php echo ' '.$post->comment_count; ?></p><br>
                    <h2 class="post-title"><?php echo $post->post_title; ?></h2>
                </div>
            </a>
        </div>
    <?php  wp_reset_postdata($post);   
    }
}
function GetPagePosts($categoryId, $postNumber){
    if(get_category($categoryId)->count > 0){
        $p = get_category($categoryId)->category_nicename;
        $page = get_page_by_path($p);
        $id = $page->ID;
    ?>
    <div class="content-categorys">
        <div class="<?php echo get_category($categoryId)->category_nicename;?>">    
        <h2 class="category-h2"><?php echo get_category($categoryId)->cat_name; ?></h2>
        <a href="index.php?page_id=<?php echo $id;?> " class="see-all">See all</a></div>
        <?php
        if($categoryId == 8){
            $args = array('category'=> '', 'post_type'=>'post', 'posts_per_page'=>$postNumber);
        }else{
            $args = array('category'=> $categoryId, 'posts_per_page'=>$postNumber);
        }
        
        GetPosts($args, 'news');
        ?>
        <br/>
    </div>
    <?php
    }
}
        
function GetBottomSliders($args, $className){
    $posts = get_posts($args);
    ?>
    <div class="<?php echo $className; ?>">
        <h2><?php echo $className; ?></h2>
        <a class="<?php echo $className.'-left'; ?>">&#10094;</a>
        <a class="<?php echo $className.'-right'; ?>">&#10095;</a>
    <?php    
    foreach($posts as $post){
        setup_postdata($post);
        ?>
        <div class="news-post">
            <a href="index.php?p=<?php echo $post->ID; ?>" title="<?php echo $post->ID; ?>" class="<?php echo $className.'-a'; ?>">
                    <div class="<?php echo $className.'-div'; ?>">
                        <?php echo get_the_post_thumbnail($post->ID); ?>
                        <p class="blog-post-meta"><?php echo date('F d, Y', strtotime($post->post_date)); ?> </p>
                        <h2 class="post-title"><?php echo $post->post_title; ?></h2>
                    </div>
                </a>
        </div>
    <?php  wp_reset_postdata($post);   
    }
    ?>
    </div>
<?php
}
function getPage(){
    $page_id = $_GET['page_id'];
    $tag = $_GET['tag'];
    $page = get_page($page_id);
    $cat =  get_category_by_slug($page->post_name);
    ?>
    <div class="content-div">
        <div class="page-posts">
            <h1><?php echo $cat->cat_name;?></h1>
            <div class="page-post">
            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            if(strlen($tag) == 0){
                $args = array(
                'category' => $cat->cat_ID,
                'posts_per_page'=>2,
                'paged'=>$paged
                );
            }else{
                $args = array(
                'posts_per_page'=>2,
                'tag' => $tag,    
                'paged'=>$paged
                );
            }
            
            $posts = get_posts($args);
            foreach($posts as $post){
                ?>
                <div>
                    <h3><?php echo $post->post_title; ?></h3>
                    <p class="post-inline"><img alt="calendar-img" src="wp-content/themes/wp_tema/img/calendar.png" class="comment-img"><?php echo '  '; echo the_time( 'F d, Y' ); ?></p>
                    <p class="post-inline"><img alt="author-img" src="wp-content/themes/wp_tema/img/author.png" class="comment-img"><?php $auth= get_user_by( 'ID', $post->post_author); echo ' '."Author: ".$auth->display_name; ?></p>
                    <p class="post-inline"><img alt="comment-img" src="wp-content/themes/wp_tema/img/comment.png" class="comment-img"><?php echo ' '.$post->comment_count ." comments" ?></p><br/>
                    <?php echo get_the_post_thumbnail($post->ID); ?>
                    
                    <p class="post-tekst">
                        <?php 
                        echo $post->fb_button;
                        $trimtitle = $post->post_content;
                        $shortpost = wp_trim_words( $trimtitle, $num_words = 30, $more = '… ' );
                        echo  $shortpost ; 
                         ?></p>
                    
                    <li><a href="index.php?p=<?php echo $post->ID; ?>">Read article</a></li>
                    <br/>
                </div>
                <hr class="post-line">
                <?php        
                }
                ?>    
            </div>
            <?php
            if(strlen($tag) == 0){
                $args2 = array('category' => $cat->cat_ID);
            }else{
                $args2 = array('tag' => $tag);
            }
            
            $posts2 = get_posts($args2);
            $postsNumber = count($posts2);
            ?>
            <div class="pagination">
                <ul>
                <?php
                for($i =1;$i <=($postsNumber/2)+1;$i++){
                 ?>
                <li>
                    <?php 
                    $url;
                    if(strlen($tag) == 0){
                        $url= $_SERVER['PHP_SELF'] . '?page_id='. $page_id . '&paged='. $i;
                    }else{
                        $url= $_SERVER['PHP_SELF'] . '?tag='. $tag . '&paged='. $i;
                    }?>
                    <a href="<?php echo $url; ?>">
                    <?php echo $i;?>
                    </a>
                </li>
                <?php
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <?php 
    get_sidebar();
}

function getPost(){
        $p = $_GET['p'];
        $post = get_post($p);
        ?>
        <img src="<?php echo the_post_thumbnail_url();?>" class="post-slika" style="width: 100%">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <p class="blog-post-meta"><?php the_time( 'F d, Y' ); ?> </p>
    </div>
    
    <div class="content-div">
        <div class="post-data">
            <p class="post-p">
               <?php 
               echo $post->post_content;
               ?> 
            </p>
            <p>
                <?php the_ratings(); ?>
            </p>
        </div>
        
        <div class="author">
            <h2>About the Author</h2>
            <div class="author-data">
                <?php echo get_avatar($post->post_author); ?>
                <p class="author-description"><?php 
                    echo the_author_meta('description', $post->post_author);
                    ?>
                </p>
            </div>
        </div>
        <div class="commentss">
            <div class="commentlist">
                <h2>Comments</h2>
                <?php  
                $comments = get_comments(array(
                    'post_id' => $post->ID,
                    'number' => '15' ));
                wp_list_comments( array(
                    'callback' => 'custom_comments',
                    'style' => 'ol'
                     ), $comments );
                ?>
            </div>
            <div class="comment">
            <?php 
            $comment_args = array( 'title_reply'=>'<h2>Add Your Comment</h2>',
            'fields' => apply_filters( 'comment_form_default_fields', array(
            'author' =>
                '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',   
            'email' => ( $req ? '<span>*</span>' : '' ) .
            '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
            'url' => '' ) ),
            'logged_in_as' => '<p class="logged-in-as">' . sprintf(
                                  /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
                                  __( 'Logged in as %3$s. <a href="%4$s">Log out?</a>' ),
                                  get_edit_user_link(),
                                  /* translators: %s: user name */
                                  esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
                                  $user_identity,
                                  wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
                              ) . '</p>',
            'comment_field' => 
                '<textarea id="comment" name="comment" placeholder="Comment" rows="8" aria-required="true"></textarea>' ,
            'comment_notes_after' => '',
            'comment_notes_before' => '',
            'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="Submit" />',
            );
            comment_form($comment_args); ?>
        </div>
    </div>
    </div>
    <?php get_sidebar(); ?> 
    <?php   
}
function GetSidebarPosts($args){
    $myposts = get_posts($args);
    foreach($myposts as $postt) :
        setup_postdata($postt);
        ?>
        <a href="index.php?p=<?php echo $postt->ID; ?>" title="<?php the_title_attribute(); ?>">
        <div class="sidebar-post-item">
            <h2 class="post-title"><?php echo $postt->post_title; ?></h2>
            <p class="blog-post-meta"><?php echo date('F d, Y', strtotime($postt->post_date)); ?> </p>
            <p class="sidebar-com"><img alt="comment-img" src="wp-content/themes/wp_tema/img/comment.png" class="comment-img"><?php echo ' '.$postt->comment_count ; ?></p><br>
            <?php echo get_the_post_thumbnail($postt->ID); ?>
        </div></a>
        <?php endforeach; wp_reset_postdata();
}
function getHome(){
    ?>
    <div class="content-div">   
        <?php GetPagePosts(8, 3);?>
        <?php GetPagePosts(2, 3);?>
        <div class="banner2">

        </div>
        <?php GetPagePosts(6, 4);?>
        
        <div class="banner2">

        </div>
        <div class="carousel-top">
            <?php 
            $args = array(
                'order' => 'rand',
                'date_query' => array(
                    array(
                        'after' => '3 days ago'
                    )
                )
            );
            GetBottomSliders($args, "carousel");?>
        </div>
        <div class="editorials-top">
            <?php 
            $argss = array(
                'tag' => 'editorials',
                'order' => 'rand',
                'date_query' => array(
                    array(
                        'after' => '3 days ago'
                    )
                )
            );
            GetBottomSliders($argss, "editorials");?>
        </div>
        <div class="local-top">
            <?php 
                $argss = array(
                    'tag' => 'local',
                    'order' => 'rand',
                    'date_query' => array(
                        array(
                            'after' => '3 days ago'
                        )
                    )
                );
                GetBottomSliders($argss, "local");?>
        </div>
    </div>
    <?php get_sidebar(); ?> <!-- /.blog-main -->
    <?php
    
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
?>