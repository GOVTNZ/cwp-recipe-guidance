<?php

class HubPage extends Page
{

    private static $db = array(
        'Description' => 'Text'
    );

    private static $allowed_children = array(
        'Page'
    );

    private static $can_be_root = true;
    private static $singular_name = 'Hub Page';
    private static $plural_name = 'Hub Pages';
    private static $description = 'Create a HubPage';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();


        return $fields;
    }

    /**
     * Determine if feature images should be displayed on this HubPage. Returns true if
     * the page has at least one feature image.
     */

}

class HubPage_Controller extends Page_Controller
{


}
