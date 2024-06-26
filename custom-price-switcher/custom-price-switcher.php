<?php
/*
Plugin Name: Imba Custom Price Switcher
Description: A plugin to add a price changer to Elementor pricing tables.
Version: 1.3
Author: Mikael Johansson
*/

// Lägg till CSS
function cps_enqueue_styles() {
    wp_enqueue_style('cps-styles', plugin_dir_url(__FILE__) . 'css/styles.css');
}
add_action('wp_enqueue_scripts', 'cps_enqueue_styles');

// Lägg till JavaScript
function cps_enqueue_scripts() {
    wp_enqueue_script('cps-scripts', plugin_dir_url(__FILE__) . 'js/scripts.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'cps_enqueue_scripts');

// Lägg till prisväxlare via en kortkod
function cps_price_switcher_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'id' => 'default',
            'default' => 'one_time', // Förvalt knapp
            'one_time' => '',
            'monthly' => '',
            'quarterly' => '',
            'half_yearly' => '',
            'yearly' => ''
        ),
        $atts,
        'price_switcher'
    );

    $id = esc_attr($atts['id']);
    $default = esc_attr($atts['default']);

    ob_start(); ?>
    <div class="pricing-switcher-container" id="pricing-switcher-container-<?php echo $id; ?>" data-default="<?php echo $default; ?>">
        <div class="pricing-switcher">
            <?php if (!empty($atts['one_time'])) : ?>
                <input type="radio" name="switch-<?php echo $id; ?>" id="one-time-<?php echo $id; ?>" <?php echo $default == 'one_time' ? 'checked' : ''; ?>>
                <label for="one-time-<?php echo $id; ?>"><?php echo esc_html($atts['one_time']); ?></label>
            <?php endif; ?>
            <?php if (!empty($atts['monthly'])) : ?>
                <input type="radio" name="switch-<?php echo $id; ?>" id="monthly-<?php echo $id; ?>" <?php echo $default == 'monthly' ? 'checked' : ''; ?>>
                <label for="monthly-<?php echo $id; ?>"><?php echo esc_html($atts['monthly']); ?></label>
            <?php endif; ?>
            <?php if (!empty($atts['quarterly'])) : ?>
                <input type="radio" name="switch-<?php echo $id; ?>" id="quarterly-<?php echo $id; ?>" <?php echo $default == 'quarterly' ? 'checked' : ''; ?>>
                <label for="quarterly-<?php echo $id; ?>"><?php echo esc_html($atts['quarterly']); ?></label>
            <?php endif; ?>
            <?php if (!empty($atts['half_yearly'])) : ?>
                <input type="radio" name="switch-<?php echo $id; ?>" id="half-yearly-<?php echo $id; ?>" <?php echo $default == 'half_yearly' ? 'checked' : ''; ?>>
                <label for="half-yearly-<?php echo $id; ?>"><?php echo esc_html($atts['half_yearly']); ?></label>
            <?php endif; ?>
            <?php if (!empty($atts['yearly'])) : ?>
                <input type="radio" name="switch-<?php echo $id; ?>" id="yearly-<?php echo $id; ?>" <?php echo $default == 'yearly' ? 'checked' : ''; ?>>
                <label for="yearly-<?php echo $id; ?>"><?php echo esc_html($atts['yearly']); ?></label>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('price_switcher', 'cps_price_switcher_shortcode');
