<?php

/**
 * @class FLExampleModuleGallery
 */
class FLExampleModuleGallery extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Filter Gallery', 'fl-builder'),
            'description'   => __('An example for coding new modules and Gallery.', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => TNIT_FILTER_GALLERY_DIR . 'filter-gallery/',
            'url'           => TNIT_FILTER_GALLERY_URL . 'filter-gallery/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        /** 
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        $this->add_css('font-awesome');
        $this->add_js('jquery-bxslider');
        // Register and enqueue your own
    }

    /** 
     * Use this method to work with settings data before 
     * it is saved. You must return the settings object. 
     *
     * @method update
     * @param $settings {object}
     */      
    public function update($settings)
    {
        $settings->textarea_field .= ' - this text was appended in the update method.';
        $settings->photos_field;
		$settings->select_field;
		$settings->no_of_posts;
		$settings->no_of_cols;
		$settings->show_overlay;
		$settings->show_lightbox;
		$settings->show_lightbox_link;
		$settings->show_title;
		$settings->show_title_link;
		$settings->show_content;
		$settings->show_link;
        return $settings;
    }

    /** 
     * This method will be called by the builder
     * right before the module is deleted. 
     *
     * @method delete
     */      
    public function delete()
    {
    
    }

    /** 
     * Add additional methods to this class for use in the 
     * other module files such as preview.php, frontend.php
     * and frontend.css.php.
     * 
     *
     * @method example_method
     */   
    public function example_method()
    {
    
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLExampleModuleGallery', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Section Title', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'select_field'   => array(
                        'type'          => 'select',
                        'label'         => __('Show Filter or Not?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'no_of_posts' => array(
                        'type'          => 'my-custom-field',
                        'label'         => __('Provide your desired number of Posts', 'fl-builder'),
                        'default'       => '8'
                    ),
					'no_of_cols' => array(
                        'type'          => 'select',
                        'label'         => __('Provide your desired number of Cols', 'fl-builder'),
                        'default'       => 'option-2',
                        'options'       => array(
                            'option-1'      => __('2', 'fl-builder'),
                            'option-2'      => __('3', 'fl-builder'),
							'option-3'      => __('4', 'fl-builder'),
							'option-4'      => __('6', 'fl-builder')
                        )
                    ),
					'show_overlay' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to Show Overlay?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'show_lightbox' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to Open Image in lightbox?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'show_lightbox_link' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to show Link Icon in Lightbox?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'show_title' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to show Post Title?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'show_title_link' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to use Link in Post Title?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'show_content' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to show Post Content?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
					'show_link' => array(
                        'type'          => 'select',
                        'label'         => __('Do You Want to show Post Link?', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Yes', 'fl-builder'),
                            'option-2'      => __('No', 'fl-builder')
                        )
                    ),
                )
            )
        )
    ),
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('example_settings_form', array(
    'title' => __('Example Form Settings', 'fl-builder'),
    'tabs'  => array(
        'general'      => array( // Tab
            'title'         => __('General', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'example'       => array(
                            'type'          => 'text',
                            'label'         => __('Example', 'fl-builder'),
                            'default'       => 'Some example text'
                        )
                    )
                )
            )
        ),
        'another'       => array( // Tab
            'title'         => __('Another Tab', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'another_example' => array(
                            'type'          => 'text',
                            'label'         => __('Another Example', 'fl-builder')
                        )
                    )
                )
            )
        )
    )
));