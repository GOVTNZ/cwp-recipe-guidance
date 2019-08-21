<?php

namespace GovtNZ\Guidance;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldEditButton;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;

/**
 * Class HubPage
 * A page type that will display a title, summary and taxonomy tags of it's child pages. Hub Pages
 * can be nested and hence store a 'Description' attribute applied by the DescriptionExtension.
 */
class HubPage extends Page
{

    private static $can_be_root = true;

    private static $singular_name = 'Hub Page';

    private static $plural_name = 'Hub Pages';

    private static $description = 'Displays a title and summary of sub-pages users can use to navigate';

    // Reuse the holder icon from CWP to show visually this is a Holder type page
    private static $icon_class = 'font-icon-p-news-item';

    private static $table_name = 'HubPage';

    private static $allowed_children = [
        Page::class,
        GuidancePage::class,
        HubPage::class,
    ];

    /**
     * A HubPage doesn't have a Content attribute because it gets content from
     * child pages.
     *
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Content');

        // Display the Taxonomy and Type as a single selectable item
        //TODO more elegant way would be to get a PR in taxonomy module to provide a concatenated name and then use this in the gridfield.
        $components = GridFieldConfig_RelationEditor::create();
        $components->removeComponentsByType(GridFieldAddNewButton::class);
        $components->removeComponentsByType(GridFieldEditButton::class);

        $dataColumns = $components->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields(array(
            'Name' => 'Term',
            'TaxonomyType' => 'Type'
        ));

        $autoCompleter = $components->getComponentByType(
            GridFieldAddExistingAutocompleter::class
        );

        $autoCompleter->setResultsFormat('$Name');

        $fields->addFieldToTab(
            'Root.Tags',
            GridField::create(
                'Terms',
                '',
                $this->Terms(),
                $components
            )
        );

        return  $fields;
    }

    public function isNavigationRoot()
    {
        return true;
    }
}
