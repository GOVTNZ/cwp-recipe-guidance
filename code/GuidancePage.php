<?php

class GuidancePage extends Page
{

    private static $db = array(
        "Title" => "Varchar(50)",
        "ShortName" => "Varchar(20)",
        "Description" => "Varchar(300)",
        "LongDescription" => "HTMLText",
        "Benefits" => "HTMLText",
        "DetailedAdvice" => "Text",
        "Tools" => "Text",
        "RelatedAdvice" => "Text",
        "Type" => "Enum(array('', 'Standards', 'Guidance', 'Product', 'Service'), '')",
        "Status" => "Enum(array('', 'Current', 'Flagged for review', 'Suspended or archived'), '')",
        "Compliance" => "Enum(array('', 'Mandatory', 'Recommended', 'Commentary'), '')"
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('RevisionNote');
        $fields->removeByName('Content');

        $fields->addFieldToTab('Root.Main', TextareaField::create('Benefits', 'Benefits'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('DetailedAdvice', 'Detailed Advice'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('Tools', 'Tools'));
        $fields->addFieldToTab('Root.Main', TextareaField::create('RelatedAdvice', 'Related Advice'));

        $fields->addFieldToTab("Root.Main", DropdownField::create ("Type", "Type", $this->dbObject('Type')->enumValues()));
        $fields->addFieldToTab("Root.Main", DropdownField::create ("Status", "Status", $this->dbObject('Status')->enumValues()));
        $fields->addFieldToTab("Root.Main", DropdownField::create ("Compliance", "Compliance", $this->dbObject('Compliance')->enumValues()));


        $fields->insertAfter('Description', new HtmlEditorField('LongDescription', 'Long Description'));
        $fields->insertAfter('URLSegment', new TextField('ShortName', 'Short Name'));

//        // Custom height Content field
//        $contentField = new TextareaField('LongDescription', 'Long Description');
//        $contentField->setRows(20);
//        $fields->addFieldToTab('Root.Main', $contentField);

        return $fields;

    }

    function getCMSValidator()
    {
        return new RequiredFields(array('Title', 'Description'));
    }

}


class GuidancePage_Controller extends Page_Controller
{


}