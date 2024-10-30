<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

/**
  @copyRight by Nsstheme
 */
//class define
class nss_cpm_all_display {

    //construct
    public function __construct() {
        add_shortcode('showing_mixup', array($this, 'nsscpm_add_short_items'));
    }

    //method
    public function nsscpm_add_short_items() {
        ob_start();
        ?>
        <section>            
            <span id="contact"> </span>
            <br/>
        </section>
        <!--control-->
        <div class="controls">             
            <?php
            $args = array(
                'type' => 'post',
                'orderby' => 'ID',
                'order' => 'DESC',
                'hide_empty' => 0,
                'hierarchical' => 1,
                'taxonomy' => 'image_location'
            );
            $categories = get_categories($args);
            if (is_array($categories) && !empty($categories)) {
                ?>
                <button class="filter" data-filter="all"><?php echo esc_html__('All', 'nsstheme-mix'); ?></button>
                <?php
                foreach ($categories as $cat) {
                    ?>
                    <button class="filter" data-filter="<?php echo '.' . esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>                    
                    <?php
                }
                
            }
            ?>              
        </div>
        <!--container-->
        <div id="Container" class="container">
            <?php
            global $post;
            $nssItem = array(
                'post_type' => array('modal_image'),
                'post_status' => array('publish'),
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            );

            $img_mode = new WP_Query($nssItem);
            if ($img_mode->have_posts()) {
                $i = 1;
                while ($img_mode->have_posts()) {
                    $img_mode->the_post();

                    $terms = get_the_terms($post->ID, 'image_location');
                    $classes = '';
                    if (is_array($terms)) {
                        foreach ($terms as $term) {
                            $classes .= ' ' . $term->slug . ' ';
                        }
                    }
                    ?>
                    <div class="mix <?php echo esc_attr($classes); ?>" data-myorder="<?php echo esc_attr($i); ?>">
                        <div class="mesoHover">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail(array(640, 445));
                            } else {
                                echo '<img src="http://placehold.it/640x445" alt=""/>';
                            }
                            ?>
                        </div>
                        <div class="nsstitle">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title(); ?></a>                              
                        </div>
                        <div class="nssdetails">
                            <?php echo substr(get_the_content(), 0, 100); ?>
                        </div>
                    </div>                    
                    <?php
                    $i++;
                }
            }
            ?>          
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
        <?php
        return ob_get_clean();
    }

//end method
}
new nss_cpm_all_display();
//end class
