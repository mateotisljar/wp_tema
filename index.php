<?php get_header(); ?>
	<div class="row">
            <div class="post-head">
                <?php  
                if (isset($_GET['p'])) {
                    getPost();
                }else if(isset($_GET['page_id']) || isset($_GET['tag'])) {
                    getPage();
                }else{
                    GetSlider();
                    getHome();
                    }  
                ?>
            </div> <!-- /.row -->
        </div>
        <?php
        if(count($_GET) == 0){
            ?>
            <div class="banner2">
            </div>
            <div id="gallery">
                <div id="full-picture">
                    <a class="image-left"><span>&#10094;</span></a>
                    <a class="image-right"><span>&#10095;</span></a>
                    <div id="0"><a name="pic1"></a><img alt="" src="http://www.planwallpaper.com/static/images/Nature-Wallpaper-29.jpg" /></div>
                    <div id="1"><a name="pic2"></a><img alt="" src="http://www.planwallpaper.com/static/images/WDF_852404.jpeg" /></div>
                    <div id="2"><a name="pic3"></a><img alt="" src="http://www.planwallpaper.com/static/images/nature-wallpapers-free-download-1.jpg" /></div>
                    <div id="3"><a name="pic4"></a><img alt="" src="https://static.pexels.com/photos/3247/nature-forest-industry-rails.jpg" /></div>
                    <div id="4"><a name="pic5"></a><img alt="" src="http://webneel.com/wallpaper/sites/default/files/images/04-2013/gorgeous-beach-wallpaper.preview.jpg" /></div>
                    <div id="5"><a name="pic6"></a><img alt="" src="http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg" /></div>
                    <div id="6"><a name="pic7"></a><img alt="" src="https://images8.alphacoders.com/553/553640.jpg" /></div>
                    <div id="7"><a name="pic7"></a><img alt="" src="http://www.uniwallpaper.com/static/images/eWtfMME_jJm8t1k.png" /></div>
                </div>
                <ul id="navigation">
                    <li name="0"><img alt="" src="http://www.planwallpaper.com/static/images/Nature-Wallpaper-29.jpg" /></li>
                    <li name="1"><img alt="" src="http://www.planwallpaper.com/static/images/WDF_852404.jpeg" /></li>
                    <li name="2"><img alt="" src="http://www.planwallpaper.com/static/images/nature-wallpapers-free-download-1.jpg" /></li>
                    <li name="3"><img alt="" src="https://static.pexels.com/photos/3247/nature-forest-industry-rails.jpg" /></li>
                    <li name="4"><img alt="" src="http://webneel.com/wallpaper/sites/default/files/images/04-2013/gorgeous-beach-wallpaper.preview.jpg" /></li>
                    <li name="5"><img alt="" src="http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg" /></li>
                    <li name="6"><img alt="" src="https://images8.alphacoders.com/553/553640.jpg" /></li>
                    <li name="7"><img alt="" src="http://www.uniwallpaper.com/static/images/eWtfMME_jJm8t1k.png" /></li>
                </ul>
            </div>
            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
            </div>
        <?php
        }
        ?>
        

        <?php get_footer(); ?>