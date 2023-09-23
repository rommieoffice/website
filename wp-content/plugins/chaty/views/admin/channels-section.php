<?php
/**
 * Contact form leads
 *
 * @author  : Premio <contact@premio.io>
 * @license : GPL2
 * */

if (defined('ABSPATH') === false) {
    exit;
}
?>
<div style="display: none">
    <?php
    $embeddedMessage = "";
    $settings        = [
        'media_buttons'    => false,
        'wpautop'          => false,
        'drag_drop_upload' => false,
        'textarea_name'    => 'chat_editor_channel',
        'textarea_rows'    => 4,
        'quicktags'        => false,
        'tinymce'          => [
            'toolbar1' => 'bold, italic, underline',
            'toolbar2' => '',
            'toolbar3' => '',
        ],
    ];
    wp_editor($embeddedMessage, "chat_editor_channel", $settings);
    ?>
</div>

<section class="section one chaty-setting-form" xmlns="http://www.w3.org/1999/html">
    <?php
    $chtWidgetTitle = get_option("cht_widget_title");
    $chtWidgetTitle = empty($chtWidgetTitle) ? "Widget-1" : $chtWidgetTitle;
    if (isset($_GET['widget_title']) && empty(!$_GET['widget_title'])) {
        $chtWidgetTitle = filter_input(INPUT_GET, 'widget_title');
    }

    ?>
    <div class="chaty-input mb-10">
        <label class="font-primary text-cht-gray-150 text-base block mb-3" for="cht_widget_title"><?php esc_html_e('Name', 'chaty'); ?></label>
        <input class="w-full sm:w-96" id="cht_widget_title" type="text" name="cht_widget_title" value="<?php echo esc_attr($chtWidgetTitle) ?>">
    </div>
    <?php
    // } ?>
    <?php
    $socialApp = get_option('cht_numb_slug');
    $socialApp = trim($socialApp, ",");
    $socialApp = explode(",", $socialApp);
    $socialApp = array_unique($socialApp);
    $imageUrl  = plugin_dir_url("")."chaty/admin/assets/images/chaty-default.png";
    ?>
    <input type="hidden" id="default_image" value="<?php echo esc_url($imageUrl)  ?>" />
    <div class="channels-icons flex max-w-full flex-wrap" id="channel-list">
        <?php if ($this->socials) :
            foreach ($this->socials as $key => $social) :
                $value       = get_option('cht_social'.'_'.$social['slug']);
                $activeClass = '';
                foreach ($socialApp as $keySoc) :
                    if ($keySoc == $social['slug']) {
                        $activeClass = 'active';
                    }
                endforeach;
                $customClass = in_array($social['slug'], array("Link", "Custom_Link", "Custom_Link_3", "Custom_Link_4", "Custom_Link_5", "Custom_Link_6"))?"custom-link":"";
                ?>
                <div class="icon cursor-pointer icon-sm chat-channel-<?php echo esc_attr($social['slug']); ?> <?php echo esc_attr($activeClass) ?> <?php echo esc_attr($customClass) ?>" data-social="<?php echo esc_attr($social['slug']); ?>" data-label="<?php echo esc_attr($social['title']); ?>">
                    <span class="icon-box">
                        <?php echo $social['svg']; ?>
                    </span>
                    <span class="channel-title"><?php echo esc_html($social['title']); ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="custom-channel-button">
        <a href="#">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" svg-inline="" focusable="false" tabindex="-1"><path d="M15.833 1.75H4.167A2.417 2.417 0 001.75 4.167v11.666a2.417 2.417 0 002.417 2.417h11.666a2.417 2.417 0 002.417-2.417V4.167a2.417 2.417 0 00-2.417-2.417zM10 6.667v6.666" stroke="#83A1B7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.667 10h6.666" stroke="#83A1B7" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <?php esc_html_e('Custom Channel', 'chaty'); ?>
        </a>
    </div>

    <input type="hidden" class="add_slug" name="cht_numb_slug" placeholder="test" value="<?php echo esc_attr(get_option('cht_numb_slug')); ?>" id="cht_numb_slug" >

    <div class="channels-selected mt-4" id="channels-selected-list">
        <div class="channel-empty-state relative <?php echo esc_attr(count($this->socials) == 0?"active":"") ?>"">
            <img class="-left-3 sm:-left-5 md:-left-8 relative" src="<?php echo esc_url(CHT_PLUGIN_URL."admin/assets/images/empty-state-star.png") ?>"/>
            <p class="absolute top-4 left-0 text-base text-cht-gray-150 w-52 text-center opacity-60"><?php esc_html_e('So many channels to choose from...', 'chaty'); ?></p>
        </div>
        <ul id="channels-selected-list" class="channels-selected-list channels-selected">
            <?php if ($this->socials) {
                $social = get_option('cht_numb_slug');
                $social = explode(",", $social);
                $social = array_unique($social);
                foreach ($social as $keySoc) {
                    foreach ($this->socials as $key => $social) {
                        if ($social['slug'] != $keySoc) {
                            // compare social media slug
                            continue;
                        }

                        include "channel.php";
                        ?>
                    <?php } ?>
                <?php } ?>
            <?php }; ?>
            <?php
            $proClass = "free";
            $text     = get_option("cht_close_button_text");
            $text     = strip_tags(($text === false) ? "Hide" : $text);
            ?>
            <!-- close setting strat -->
            <li class="chaty-cls-setting" data-id="" id="chaty-social-close">
                <div class="channels-selected__item pro 1 available flex items-start space-x-3 ml-4">
                    <div class="chaty-default-settings">
                        <div class="move-icon hidden">
                            <img src="<?php echo esc_url(CHT_PLUGIN_URL."admin/assets/images/move-icon.png") ?>" style="opacity:0"; />
                        </div>
                        <div class="icon icon-md active" data-label="close">
                            <span id="image_data_close">
                                <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="26" cy="26" rx="26" ry="26" fill="#A886CD"></ellipse><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(18.35 15.6599) scale(0.998038 1.00196) rotate(45)" fill="white"></rect><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(37.5056 18.422) scale(0.998038 1.00196) rotate(135)" fill="white"></rect></svg>
                            </span>
                            <span class="default_image_close" style="display: none;">
                                 <svg viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="26" cy="26" rx="26" ry="26" fill="#A886CD"></ellipse><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(18.35 15.6599) scale(0.998038 1.00196) rotate(45)" fill="white"></rect><rect width="27.1433" height="3.89857" rx="1.94928" transform="translate(37.5056 18.422) scale(0.998038 1.00196) rotate(135)" fill="white"></rect></svg>
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="channels__input-box cls-btn-settings active">
                            <input type="text" class="channels__input close-button-text" name="cht_close_button_text" value="<?php echo esc_attr((wp_unslash($text))) ?>" >
                        </div>
                        <div class="input-example cls-btn-settings active font-primary text-cht-gray-150 text-base mt-1">
                            <?php esc_html_e('On hover Close button text', 'chaty'); ?>
                        </div>
                    </div>
                </div>
            </li>
            <!-- close setting end -->
        </ul>

        <div class="channels-selected__item disabled" style="opacity: 0; display: none;"></div>

        <input type="hidden" id="is_pro_plugin" value="0" />
    </div>
</section>
<script>
    var PRO_PLUGIN_URL = "<?php echo esc_url(CHT_PRO_URL) ?>";
</script>

