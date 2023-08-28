<?php 
/**
 * @Packge     : Agenxe
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */
 
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit();
	}

	/**
	* Hook for preloader
	*/
	add_action( 'agenxe_preloader_wrap', 'agenxe_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'agenxe_main_wrapper_start', 'agenxe_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'agenxe_header', 'agenxe_header_cb', 10 );

	/**
	* Hook for Grid Line
	*/
	add_action( 'agenxe_grid_lines', 'agenxe_grid_lines_cb', 10 );
	
	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'agenxe_blog_start_wrap', 'agenxe_blog_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'agenxe_blog_col_start_wrap', 'agenxe_blog_col_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'agenxe_blog_col_end_wrap', 'agenxe_blog_col_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'agenxe_blog_end_wrap', 'agenxe_blog_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Pagination
	*/
    add_action( 'agenxe_blog_pagination', 'agenxe_blog_pagination_cb', 10 );
    
    /**
	* Hook for Blog Content
	*/
	add_action( 'agenxe_blog_content', 'agenxe_blog_content_cb', 10 );
    
    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'agenxe_blog_sidebar', 'agenxe_blog_sidebar_cb', 10 );
    
    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'agenxe_blog_details_sidebar', 'agenxe_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'agenxe_blog_details_wrapper_start', 'agenxe_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'agenxe_blog_post_meta', 'agenxe_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'agenxe_blog_details_share_options', 'agenxe_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Post Share Options
	*/
	add_action( 'agenxe_blog_post_share_options', 'agenxe_blog_post_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'agenxe_blog_details_author_bio', 'agenxe_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'agenxe_blog_details_tags_and_categories', 'agenxe_blog_details_tags_and_categories_cb', 10 );

	/**
	* Hook for Blog Details Related Post Navigation
	*/
	add_action( 'agenxe_blog_details_post_navigation', 'agenxe_blog_details_post_navigation_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'agenxe_blog_details_comments', 'agenxe_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('agenxe_blog_details_col_start','agenxe_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('agenxe_blog_details_col_end','agenxe_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('agenxe_blog_details_wrapper_end','agenxe_blog_details_wrapper_end_cb');
	
	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('agenxe_blog_post_thumb','agenxe_blog_post_thumb_cb');
    
	/**
	* Hook for Blog Post Content
	*/
	add_action('agenxe_blog_post_content','agenxe_blog_post_content_cb');
	
    
	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('agenxe_blog_postexcerpt_read_content','agenxe_blog_postexcerpt_read_content_cb');
	
	/**
	* Hook for footer content
	*/
	add_action( 'agenxe_footer_content', 'agenxe_footer_content_cb', 10 );
	
	/**
	* Hook for main wrapper end
	*/
	add_action( 'agenxe_main_wrapper_end', 'agenxe_main_wrapper_end_cb', 10 );
	
	/**
	* Hook for Back to Top Button
	*/
	add_action( 'agenxe_back_to_top', 'agenxe_back_to_top_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'agenxe_page_start_wrap', 'agenxe_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'agenxe_page_end_wrap', 'agenxe_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'agenxe_page_col_start_wrap', 'agenxe_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'agenxe_page_col_end_wrap', 'agenxe_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'agenxe_page_sidebar', 'agenxe_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'agenxe_page_content', 'agenxe_page_content_cb', 10 );