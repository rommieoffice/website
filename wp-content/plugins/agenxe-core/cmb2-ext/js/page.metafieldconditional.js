(function($){
    "use strict";
    
    let $agenxe_page_breadcrumb_area      = $("#_agenxe_page_breadcrumb_area");
    let $agenxe_page_settings             = $("#_agenxe_page_breadcrumb_settings");
    let $agenxe_page_breadcrumb_image     = $("#_agenxe_breadcumb_image");
    let $agenxe_page_title                = $("#_agenxe_page_title");
    let $agenxe_page_title_settings       = $("#_agenxe_page_title_settings");

    if( $agenxe_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--agenxe-page-breadcrumb-settings").show();
        if( $agenxe_page_settings.val() == 'global' ) {
            $(".cmb2-id--agenxe-breadcumb-image").hide();
            $(".cmb2-id--agenxe-page-title").hide();
            $(".cmb2-id--agenxe-page-title-settings").hide();
            $(".cmb2-id--agenxe-custom-page-title").hide();
            $(".cmb2-id--agenxe-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--agenxe-breadcumb-image").show();
            $(".cmb2-id--agenxe-page-title").show();
            $(".cmb2-id--agenxe-page-breadcrumb-trigger").show();
    
            if( $agenxe_page_title.val() == '1' ) {
                $(".cmb2-id--agenxe-page-title-settings").show();
                if( $agenxe_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--agenxe-custom-page-title").hide();
                } else {
                    $(".cmb2-id--agenxe-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--agenxe-page-title-settings").hide();
                $(".cmb2-id--agenxe-custom-page-title").hide();
    
            }
        }
    } else {
        $agenxe_page_breadcrumb_area.parents('.cmb2-id--agenxe-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $agenxe_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--agenxe-page-breadcrumb-settings").show();
            if( $agenxe_page_settings.val() == 'global' ) {
                $(".cmb2-id--agenxe-breadcumb-image").hide();
                $(".cmb2-id--agenxe-page-title").hide();
                $(".cmb2-id--agenxe-page-title-settings").hide();
                $(".cmb2-id--agenxe-custom-page-title").hide();
                $(".cmb2-id--agenxe-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--agenxe-breadcumb-image").show();
                $(".cmb2-id--agenxe-page-title").show();
                $(".cmb2-id--agenxe-page-breadcrumb-trigger").show();
        
                if( $agenxe_page_title.val() == '1' ) {
                    $(".cmb2-id--agenxe-page-title-settings").show();
                    if( $agenxe_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--agenxe-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--agenxe-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--agenxe-page-title-settings").hide();
                    $(".cmb2-id--agenxe-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--agenxe-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $agenxe_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--agenxe-page-title-settings").show();
            if( $agenxe_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--agenxe-custom-page-title").hide();
            } else {
                $(".cmb2-id--agenxe-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--agenxe-page-title-settings").hide();
            $(".cmb2-id--agenxe-custom-page-title").hide();

        }
    });

    //page settings
    $agenxe_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--agenxe-breadcumb-image").hide();
            $(".cmb2-id--agenxe-page-title").hide();
            $(".cmb2-id--agenxe-page-title-settings").hide();
            $(".cmb2-id--agenxe-custom-page-title").hide();
            $(".cmb2-id--agenxe-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--agenxe-breadcumb-image").show();
            $(".cmb2-id--agenxe-page-title").show();
            $(".cmb2-id--agenxe-page-breadcrumb-trigger").show();
    
            if( $agenxe_page_title.val() == '1' ) {
                $(".cmb2-id--agenxe-page-title-settings").show();
                if( $agenxe_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--agenxe-custom-page-title").hide();
                } else {
                    $(".cmb2-id--agenxe-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--agenxe-page-title-settings").hide();
                $(".cmb2-id--agenxe-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $agenxe_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--agenxe-custom-page-title").hide();
        } else {
            $(".cmb2-id--agenxe-custom-page-title").show();
        }
    });
    
})(jQuery);