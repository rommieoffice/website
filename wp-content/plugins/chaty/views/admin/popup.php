<?php
/**
 * Chaty Popups
 *
 * @author  : Premio <contact@premio.io>
 * @license : GPL2
 * */

if (defined('ABSPATH') === false) {
    exit;
}
?>
<div class="chaty-popup" id="custom-message-popup">
    <div class="chaty-popup-outer"></div>
    <div class="chaty-popup-inner popup-pos-bottom">
        <div class="chaty-popup-content">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"/></svg>
                </a>
            </div>
            <div class="a-card a-card--normal">
                <div class="chaty-popup-header font-medium font-primary">
                    <?php esc_html_e("No channel was selected", 'chaty'); ?>
                </div>
                <div class="chaty-popup-body">
                    <?php esc_html_e("Please select at least one chat channel before publishing your widget", 'chaty'); ?>
                </div>
                <input type="hidden" id="delete_widget_id" value="">
                <div class="chaty-popup-footer">
                    <button type="button" class="btn btn-default check-for-numbers"><?php esc_html_e("Save Anyway", 'chaty'); ?></button>
                    <button type="button" class="close-chaty-popup-btn channel-setting-btn btn btn-primary"><?php esc_html_e("Change Number", 'chaty'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="chaty-popup" id="no-device-popup">
    <div class="chaty-popup-outer"></div>
    <div class="chaty-popup-inner popup-pos-bottom">
        <div class="chaty-popup-content">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn relative top-2 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"/></svg>
                </a>
            </div>
            <div class="a-card a-card--normal">
                <div class="chaty-popup-header text-cht-gray-150 py-4 font-medium text-left px-5">
                    <?php esc_html_e("No channel was selected", 'chaty'); ?>
                </div>
                <div class="text-cht-gray-150 text-base px-5 py-6">
                    <?php esc_html_e("Please select at least one chat channel before publishing your widget", 'chaty'); ?>
                </div>
                <input type="hidden" id="delete_widget_id" value="">
                <div class="chaty-popup-footer flex px-5">
                    <button type="button" class="close-chaty-popup-btn channel-setting-btn btn btn-primary rounded-lg mr-5"><?php esc_html_e("Select Channel", 'chaty'); ?></button>
                    <button type="button" class="btn btn-default check-for-triggers btn btn-primary btn rounded-lg btn-primary bg-transparent text-cht-gray-150 border-cht-gray-150 hover:bg-transparent hover:text-cht-gray-150"><?php esc_html_e("Save Anyway", 'chaty'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="chaty-popup" id="no-device-value">
    <div class="chaty-popup-outer"></div>
    <div class="chaty-popup-inner popup-pos-bottom">
        <div class="chaty-popup-content">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn relative top-2 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"/></svg>
                </a>
            </div>
            <div class="a-card a-card--normal">
                <div class="chaty-popup-header text-cht-gray-150 font-medium py-4 text-left px-5">
                    <?php esc_html_e("Fill out at least one channel details", 'chaty'); ?>
                </div>
                <div class="text-cht-gray-150 text-base px-5 py-6">
                    <?php esc_html_e("You need to fill out at least one channel details for Chaty to show up on your website", 'chaty'); ?>
                </div>
                <input type="hidden" id="delete_widget_id" value="">
                <div class="chaty-popup-footer flex px-5">
                    <button type="button" class="btn rounded-lg btn-default check-for-triggers  bg-transparent text-cht-gray-150 border-cht-gray-150 hover:bg-transparent hover:text-cht-gray-150 mr-5"><?php esc_html_e("Save Anyway", 'chaty'); ?></button>
                    <button type="button" class="close-chaty-popup-btn channel-setting-btn btn rounded-lg btn-primary"><?php esc_html_e("Fill channel details", 'chaty'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="chaty-popup" id="device-popup">
    <div class="chaty-popup-outer"></div>
    <div class="chaty-popup-inner popup-pos-bottom">
        <div class="chaty-popup-content">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"/></svg>
                </a>
            </div>
            <div class="a-card a-card--normal">
                <div class="chaty-popup-header text-cht-gray-150 font-medium py-4 text-left px-5">
                    <?php esc_html_e("No device was selected", 'chaty'); ?>
                </div>
                <div class="text-cht-gray-150 text-base px-5 py-6">
                    <?php esc_html_e("Please select mobile/desktop before publishing your widget", 'chaty'); ?>
                </div>
                <input type="hidden" id="delete_widget_id" value="">
                <div class="chaty-popup-footer flex px-5">
                    <button type="button" class="btn btn-default check-for-triggers rounded-lg bg-transparent text-cht-gray-150 border-cht-gray-150 hover:bg-transparent hover:text-cht-gray-150 mr-5"><?php esc_html_e("Save Anyway", 'chaty'); ?></button>
                    <button type="button" class="close-chaty-popup-btn channel-setting-btn btn rounded-lg btn-primary"><?php esc_html_e("Select Device", 'chaty'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chaty-popup" id="trigger-popup">
    <div class="chaty-popup-outer"></div>
    <div class="chaty-popup-inner popup-pos-bottom">
        <div class="chaty-popup-content">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn relative top-2 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"></path></svg>
                </a>
            </div>
            <div class="a-card a-card--normal">
                <div class="chaty-popup-header font-medium text-cht-gray-150 py-4 text-left px-5">
                    <?php esc_html_e("No trigger was selected", 'chaty'); ?>
                </div>
                <div class="text-cht-gray-150 text-base px-5 py-6">
                    <?php esc_html_e("Please select a trigger before publishing your widget", 'chaty'); ?>
                </div>
                <input type="hidden" id="delete_widget_id" value="">
                <div class="chaty-popup-footer flex px-5">
                    <button type="button" class="btn-default check-for-status btn rounded-lg btn-primary bg-transparent text-cht-gray-150 border-cht-gray-150 hover:bg-transparent hover:text-cht-gray-150 mr-5"><?php esc_html_e("Save Anyway", 'chaty'); ?></button>
                    <button type="button" class="close-chaty-popup-btn select-trigger-btn btn btn-primary rounded-lg"><?php esc_html_e("Select Trigger", 'chaty'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chaty-popup" id="status-popup">
    <div class="chaty-popup-outer"></div>
    <div class="chaty-popup-inner popup-pos-bottom">
        <div class="chaty-popup-content">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn relative top-2 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"/></svg>
                </a>
            </div>
            <div class="a-card a-card--normal">
                <div class="chaty-popup-header font-medium text-cht-gray-150 py-4 text-left px-5">
                    <?php esc_html_e("Chaty is currently off", 'chaty'); ?>
                </div>
                <div class="text-cht-gray-150 text-base px-5 py-6">
                    <?php esc_html_e("Chaty is currently turned off, would you like to save and show it on your site?", 'chaty'); ?>
                </div>
                <input type="hidden" id="delete_widget_id" value="">
                <div class="chaty-popup-footer flex px-5">
                    <button type="button" class="btn-default status-and-save btn-primary btn rounded-lg bg-transparent text-cht-gray-150 border-cht-gray-150 hover:bg-transparent hover:text-cht-gray-150 mr-5"><?php esc_html_e("Just save and keep it off", 'chaty'); ?></button>
                    <button type="button" class="btn-primary change-status-btn change-status-and-save btn rounded-lg"><?php esc_html_e("Save & Show on my site", 'chaty'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="first-chaty-popup" id="agent-popup">
    <div class="first-chaty-popup-overlay"></div>
    <div class="upgrade-to-premium bg-white relative overflow-hidden">
        <div class="first-chaty-popup-data">
            <a href="#" class="close-first-popup close-popup">
                <img src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/x.svg" alt="chaty" />
            </a>
            <img class="mx-auto max-w-[200px]" src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/agent-list.png" alt="chaty" />
            <div class="text-[#49687E] mb-4 mt-2 font-primary text-2xl sm:text-3xl"><?php esc_html_e("👑 Multiple Agents is a Premium Feature", "chaty"); ?></div>
            <div class="text-base text-center font-normal font-primary max-w-[452px] mx-auto text-[#49687E] p-25">
                Show <b class="font-medium">multiple agents</b> under a single channel. <b class="font-medium">For example</b>, allow visitors to reach for pre-sales info or support with different channels on WhatsApp or any other channel.
            </div>
            <div class="mt-10 relative z-10">
                <a class="text-white border border-cht-primary bg-cht-primary focus:text-white hover:bg-[#9455e1] ease-linear duration-200 hover:text-white px-10 py-2.5 inline-flex items-center space-x-3 rounded-lg mx-auto text-base font-primary drop-shadow-3xl" target="_blank" href="<?php echo admin_url("admin.php?page=chaty-app-upgrade") ?>">
                    <?php esc_html_e("Upgrade to Pro", "chaty"); ?>
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none">
                        <path d="M6.5 12L10.5 8L6.5 4" stroke="currentColor" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <img class="absolute z-0 left-0 bottom-0" src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/particle.png" alt="chaty" />
            <img class="absolute z-0 right-0 top-[30%] drop-shadow-xl" src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/particle2.png" alt="chaty" />
            <img class="absolute z-0 left-5 drop-shadow-xl top-8" src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/particle3.png" alt="chaty" />
        </div>
    </div>
</div>


<div class="chaty-popup" id="chat-view-popup" >
    <div class="chat-view-popup-overlay"></div>
    <div class="chat-view-popup-content">
        <div class="chat-view-popup-data">
            <div class="chaty-popup-close">
                <a href="javascript:void(0)" class="close-delete-pop close-chaty-popup-btn relative top-2 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6 15.5c-.53.53-1.38.53-1.91 0L8.05 9.87 2.31 15.6c-.53.53-1.38.53-1.91 0s-.53-1.38 0-1.9l5.65-5.64L.4 2.4C-.13 1.87-.13 1.02.4.49s1.38-.53 1.91 0l5.64 5.63L13.69.39c.53-.53 1.38-.53 1.91 0s.53 1.38 0 1.91L9.94 7.94l5.66 5.65c.52.53.52 1.38 0 1.91z"></path></svg>
                </a>
            </div>
            <div class="chat-view-data">
                <div class="chat-view-data-left">
                    <div class="chat-view-content">
                        <img src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/pro-feature.png">
                        <div class="view-pro-title"><?php esc_html_e("Upgrade to Pro", "chaty"); ?> 🎉</div>
                        <div class="view-pro-desc"><?php esc_html_e("Enjoy awesome features like chat view, a customized pop-up view. Use the amazing WooCommerce customization to add merge tags like the title, URL, product name, and more. Customize pop-ups for various products, pages, and more!", "chaty"); ?></div>
                        <div class="view-pro-btn">
                            <a target="_blank" href="<?php echo admin_url("admin.php?page=chaty-app-upgrade") ?>">
                                <?php esc_html_e("Upgrade to Pro", "chaty"); ?>
                            </a>
                        </div>
                        <div class="view-pro-bottom">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg><?php esc_html_e("Cancel anytime. No strings attached", "chaty"); ?></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg><?php esc_html_e("30 days refund", "chaty"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="chat-view-data-right">
                    <div class="chat-view-content">
                        <div class="chat-slider">
                            <div class="chat-slides">
                                <div class="chat-slide chat-slide-1 active" data-slide="1">
                                    <img src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/chat-view-preview.png" alt="chaty" />
                                    <span class="text-bottom"><?php esc_html_e("Chat view for all your channels!", "chaty"); ?></span>
                                </div>
                                <div class="chat-slide chat-slide-2" data-slide="2">
                                    <span class="text-top"><?php esc_html_e("Customize Pop-ups for product pages!", "chaty"); ?></span>
                                    <img src="<?php echo CHT_PLUGIN_URL ?>admin/assets/images/woo-commerce-preview.png" alt="chaty" />
                                </div>
                            </div>
                        </div>
                        <div class="chat-slider-options">
                            <ul>
                                <li><a href="javascript:;" class="prev-slide">❮</a></li>
                                <li><a href="javascript:;" class="slide-option slide-1 active" data-slide="1"><span></span></a></li>
                                <li><a href="javascript:;" class="slide-option slide-2" data-slide="2"><span></span></a></li>
                                <li><a href="javascript:;" class="next-slide">❯</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
