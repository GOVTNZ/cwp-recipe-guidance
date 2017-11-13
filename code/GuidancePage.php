<?php

class GuidancePage extends Page
{

    private static $db = array(
        "Title" => "Varchar(50)",
        "ShortName" => "Varchar(20)",
        "Description" => "Varchar(300)",
        "Outcomes" => "HTMLText",
        "DetailedAdvice" => "Text",
        "Tools" => "Text",
        "ContactPoint" => "Text",
        "Owner" => "Text",
        "RelatedAdvice" => "Text",
        "Type" => "Enum(array('', 'Standards', 'Guidance', 'Product', 'Service'), '')",
        "Status" => "Enum(array('', 'Current', 'Flagged for review', 'Suspended or archived'), '')",
        "Compliance" => "Enum(array('', 'Mandatory', 'Recommended', 'Commentary'), '')"
    );


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('RevisionNote');

        $fields->addFieldToTab('Root.Main', TextareaField::create('Description', 'Description'));
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Outcomes', 'Outcomes'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('DetailedAdvice', 'Detailed Advice'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('Tools', 'Tools'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('RelatedAdvice', 'Related Advice'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('ContactPoint', 'Contact Point'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('Owner', 'Owner'));

        $fields->addFieldToTab("Root.Main", DropdownField::create ("Type", "Type", $this->dbObject('Type')->enumValues()));
        $fields->addFieldToTab("Root.Main", DropdownField::create ("Status", "Status", $this->dbObject('Status')->enumValues()));
        $fields->addFieldToTab("Root.Main", DropdownField::create ("Compliance", "Compliance", $this->dbObject('Compliance')->enumValues()));


        // $fields->insertAfter('Description', new HtmlEditorField('Content', 'Long Description'));

        $fields->insertAfter('URLSegment', new TextField('ShortName', 'Short Name'));

//        // Custom height Content field
       // $contentField = new TextareaField('Content', 'Long Description');
       // $contentField->setRows(20);
       // $fields->addFieldToTab('Root.Main', $contentField);

        // Taxonomy - Paste and pray
        // TODO: remove 'type' option?
        $components = GridFieldConfig_RelationEditor::create();
        $components->removeComponentsByType('GridFieldAddNewButton');
        $components->removeComponentsByType('GridFieldEditButton');

        $autoCompleter = $components->getComponentByType('GridFieldAddExistingAutocompleter');
        $autoCompleter->setResultsFormat('$Name ($TaxonomyName)');

        $dataColumns = $components->getComponentByType('GridFieldDataColumns');
        $dataColumns->setDisplayFields(array(
           'Name' => 'Term',
           'TaxonomyName' => 'Taxonomy'
        ));

        $fields->addFieldToTab(
           'Root.Tags',
           new GridField(
               'Terms',
               'Terms',
               $this->Terms(),
               $components
           )
        );

        return $fields;

    }

    private static $many_many = array(
        'Terms' => 'TaxonomyTerm'
    );

    function getCMSValidator()
    {
        return new RequiredFields(array('Title', 'Description'));
    }

}


class GuidancePage_Controller extends Page_Controller
{


}