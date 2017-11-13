<?php
/**
 * Decorates a DataObject or Page Type to add a short metadata description used to describe the content on the page.
 * Uses the schema.org terminology "description" to help move toward semantic web/structured data approach to content.
 * All structured content should have Descripton metadata.
 */
class DescriptionExtensions extends DataExtension
{
    private static $db = array (
        'Description' => 'Text'
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->insertAfter(
            'MenuTitle',
            TextareaField::create('Description', 'Description')
                ->setDescription('Provide a short summary of the content')
        );
    }
}