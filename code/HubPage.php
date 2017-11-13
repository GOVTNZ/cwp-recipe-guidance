<?php

/**
 * Class HubPage
 * A page type that will display a title, summary and taxonomy tags of it's child pages. Hub Pages
 * can be nested and hence store a 'Description' attribute applied by the DescriptionExtension.
 */
class HubPage extends Page
{

    private static $allowed_children = array(
        'Page',
        'GuidancePage',
        'HubPage',
    );

    private static $can_be_root = true;

    private static $singular_name = 'Hub Page';

    private static $plural_name = 'Hub Pages';

    private static $description = 'Displays a title and summary of sub-pages users can use to navigate';

    //Reuse the holder icon from CWP to show visually this is a Holder type page
    private static $icon = 'cwp/images/icons/sitetree_images/news_listing.png';

    /**
     * A HubPage doesn't have a Content attribute because it gets content from child pages.
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Content');
        return  $fields;
    }

}

class HubPage_Controller extends Page_Controller
{

}
