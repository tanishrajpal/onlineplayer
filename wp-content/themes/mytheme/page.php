<?php

get_header();

?>
<div id="content">
        <?php    
        if(have_posts()){
                while(have_posts()){
                    the_post();
                    ?>
                        <?php the_content(); ?>
                        <!-- <h2 class="card-title"><?php// the_title();?></h2> -->
                        <!-- <p class="card-text"></p> -->
                    
                    <?php
                }
            }
            ?>
        </div>

<?php
get_footer();
?>