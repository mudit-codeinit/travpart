<?php
if ( ! defined('ABSPATH') ) { die( 'Cheating? Direct access is not allowed !!!' ); }
if(!class_exists('ADL_LP_general')):
class ADL_LP_general {


    public function __construct(){

        add_action('admin_menu', array($this, 'show_admin_menu'));
    }

    /**
     * Show all menu pages for Legal pages
     */
    public function show_admin_menu() {
        add_menu_page(
            __('Legal Page Settings', ADL_LP_TEXTDOMAIN),
            __('Legal Pages', ADL_LP_TEXTDOMAIN),
            'manage_options',
            'adl-legal-pages',
            array($this, 'general_setting'),
            'dashicons-welcome-add-page',
            20
            );

        add_submenu_page('adl-legal-pages',
            __('Create Legal Page', ADL_LP_TEXTDOMAIN),
            __('Create Legal Page', ADL_LP_TEXTDOMAIN),
            'manage_options',
            'adl-legal-pages&tab=createLegalPage',
            array($this, 'show_create_legal_page')
        );
        
        add_submenu_page('adl-legal-pages',
            __('All Legal Pages', ADL_LP_TEXTDOMAIN),
            __('All Legal Pages', ADL_LP_TEXTDOMAIN),
            'manage_options',
            'adl-legal-pages&tab=allPages',
            array($this, 'show_create_legal_page')
        );

        add_submenu_page('adl-legal-pages',
            __('Create | Edit Legal Page Template', ADL_LP_TEXTDOMAIN),
            __('Create Legal Page Template', ADL_LP_TEXTDOMAIN),
            'manage_options',
            'adl-create-template',
            array($this, 'show_create_template')
        );

        add_submenu_page('adl-legal-pages',
            __('All Templates', ADL_LP_TEXTDOMAIN),
            __('All Templates', ADL_LP_TEXTDOMAIN),
            'manage_options',
            'adl-legal-pages&tab=editTemplates',
            array($this, 'show_create_legal_page')
        );

        add_submenu_page('adl-legal-pages',
            __('Get Support', ADL_LP_TEXTDOMAIN),
            __('Get Support', ADL_LP_TEXTDOMAIN),
            'manage_options',
            'adl-legal-pages&tab=support',
            array($this, 'show_create_legal_page')
        );

        add_submenu_page('adl-legal-pages',
            __('Get More Templates', ADL_LP_TEXTDOMAIN),
            "<span style='color:#00b9eb;'>".__('Upgrade to Pro', ADL_LP_TEXTDOMAIN)."</span>",
            'manage_options',
            'adl-lp-upgrade',
            array($this, 'upgrade_notice')
        );

    }
    
    public function upgrade_notice(  ) {
        global $ADL_LP;
        $ADL_LP->loadView('upgrade-features');
    }

    public function show_create_legal_page(  ) {
        // this function is kept empty intentionally to redirect menu pages to the specific setting tab using javascripts.
    }
    
    public function show_create_template(  ) {
        global $ADL_LP, $wpdb;
        $sql1 = 'SELECT * from '.$ADL_LP->template_table_name .' LIMIT 40';
        $adl_lp_templates = $wpdb->get_results($sql1); // get all legal templates
        $ADL_LP->loadView('settings/tab-content/create-edit-templates', $adl_lp_templates);
    }
    
    public function general_setting() {
        global $ADL_LP;
        $data = array(
                'adl_legal_pages' => $ADL_LP->get_lp_pages(),
                'adl_lp_templates' => $ADL_LP->get_lp_templates(),
        );
        // if terms already accepted then show the setting else tell the users to accept terms
        if ( get_option('adl_lp_accept_term') ) {
            $ADL_LP->loadView('settings/general', $data);
            //update_option('adl_lp_accept_term', 0);// test Disclaimer page uncommenting this.
        }else {
            $this->acceptTermsAndCondition();
        }
    }
    
    public function acceptTermsAndCondition() {
        global $ADL_LP;
        // set adl_lp_accept_term when user use the plugin for the first time and them load the general  setting. else show the terms page.
        if ( isset($_POST['adl_lp_submit']) && 'I Agree' == $_POST['adl_lp_submit'] && isset($_POST['adl_accept_terms'])) {
            update_option('adl_lp_accept_term', $_POST['adl_accept_terms']);
            $this->general_setting();
        }else{
            $ADL_LP->loadView('disclaimer');
        }
    }
}

endif;