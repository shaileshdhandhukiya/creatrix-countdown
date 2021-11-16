<?php

namespace Elementor;
if (!defined('ABSPATH')) exit;
$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

if($settings['custom_css']){
    echo esc_html($settings['custom_css']);
}

$align = $settings['align'];
     
$this->add_render_attribute( 'render_attribute', 'data-date', esc_attr($settings['future_date']) );

if($settings['show_label']) {
    $label = "true";
} else {
    $label = "false";
}

$this->add_render_attribute( 'render_attribute', 'data-labels', esc_attr($label) );
$this->add_render_attribute( 'render_attribute', 'data-format', esc_attr($settings['timer_format']) ); 

if($settings['counter_style'] == "style_1"){ ?>

    <div class="creatrix-count-down <?php echo esc_attr($align); ?>">
    <!-- TITLE START -->
        <<?php echo esc_attr($settings['title_tag']); ?> class="creatrix-title creatrix-heading-title">
            <?php echo esc_html__($settings['timer_title'],'creatrix'); ?>
        </<?php echo esc_attr($settings['title_tag']); ?>>
    <!-- TITLE END-->
        <span class="creatrix-data-countdown-timer" <?php echo $this->get_render_attribute_string( 'render_attribute' ); ?>></span>   
    </div>
    
<?php } elseif($settings['counter_style'] == "style_2"){ ?>

    <div class="creatrix-count-down creatrix-style-two <?php echo esc_attr($align); ?>">
        <span class="creatrix-data-countdown-timer" <?php echo $this->get_render_attribute_string( 'render_attribute' ); ?>></span>   
    </div>

<?php } ?>
 