<?php

namespace GovtNZ\Guidance;

use Page;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldEditButton;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;

class GuidancePage extends Page
{

    private static $can_be_root = true;

    private static $singular_name = 'Guidance Page';

    private static $plural_name = 'Guidance Pages';

    private static $description = 'Provides educational guidance content to readers';

    private static $db = [
        'LearningOutcomes' => 'HTMLText', //Used to show learning outcomes of following this guidance usually as bullet points.
        'Author' => 'Text', //Will be the name of the contributing agency for the guidance with later refactor to use the Govt.nz A-Z API.
        'ContactPointName' => 'Varchar(255)', //A contact for this guidance
        'ContactPointEmail' => 'Varchar(255)', // Contact Email for this guidance
    ];

    private static $table_name = 'GuidancePage';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main',
            HTMLEditorField::create('LearningOutcomes')
                ->setRows(4)
                ->setDescription('Use bullet points to highlight what the reader will learn from this guidance.'),
            'Content'
        );
        $fields->addFieldToTab('Root.Contact', TextField::create('Author', 'Authoring Agency'));
        $fields->addFieldToTab('Root.Contact', TextField::create('ContactPointName'));
        $fields->addFieldToTab('Root.Contact', EmailField::create('ContactPointEmail'));

        // Display the Taxonomy and Type as a single selectable item
        //TODO more elegant way would be to get a PR in taxonomy module to provide a concatenated name and then use this in the gridfield.
        $components = GridFieldConfig_RelationEditor::create();
        $components->removeComponentsByType(GridFieldAddNewButton::class);
        $components->removeComponentsByType(GridFieldEditButton::class);

        $autoCompleter = $components->getComponentByType(
            GridFieldAddExistingAutocompleter::class
        );

        $autoCompleter->setResultsFormat('$Name ($TaxonomyType)');

        $dataColumns = $components->getComponentByType(GridFieldDataColumns::class);
        $dataColumns->setDisplayFields(array(
           'Name' => 'Term',
           'TaxonomyType' => 'Type'
        ));

        $fields->addFieldToTab(
           'Root.Tags',
           GridField::create(
               'Terms',
               'Terms',
               $this->Terms(),
               $components
           )
        );

        return $fields;

    }
}
