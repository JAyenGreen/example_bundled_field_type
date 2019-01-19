<?php
namespace Drupal\name_field_type\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\file\Entity\File;
use Drupal\file\Plugin\Field\FieldType\FileItem;
/**
 * @FieldType(
 *   id = "name",
 *   module = "name_field_type",
 *   label = @Translation("Name Widget"),
 *   description = @Translation("This field type stores name information."),
 *   default_widget = "name_widget",
 *   default_formatter = "name_formatter",
 * )
 */
class NameItem extends FieldItemBase {

    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {

        $properties = [];

        $properties['title'] = DataDefinition::create('string')
            ->setLabel(t('Title'))
            ->setDescription(t('Title preceding first name.'));

        $properties['first_name'] = DataDefinition::create('string')
            ->setLabel(t('First name'))
            ->setDescription(t('Given name.'));

        $properties['middle_name'] = DataDefinition::create('string')
            ->setLabel(t('Middle name/initial'));

        $properties['last_name'] = DataDefinition::create('string')
            ->setLabel(t('Last name'))
            ->setDescription(t('Surname / family name.'));

        $properties['maternal_last_name'] = DataDefinition::create('string')
            ->setLabel(t('Maternal last name'));

        $properties['suffix'] = DataDefinition::create('string')
            ->setLabel(t('Suffix'))
            ->setDescription(t('Honorific or generation following the name, e.g. Esq., Jr.'));
        return $properties;
    }
    public static function schema(FieldStorageDefinitionInterface $field_definition) {
        $columns = array(
            'title' => array(
                'type' => 'varchar',
                'length' => 255,
            ),
            'first_name' => array(
                'type' => 'varchar',
                'length' => 255,
            ),
            'middle_name' => array(
                'type' => 'varchar',
                'length' => 255,
            ),
            'last_name' => array(
                'type' => 'varchar',
                'length' => 8,
            ),
            'maternal_last_name' => array(
                'type' => 'varchar',
                'length' => 255,
            ),
            'suffix' => array(
                'type' => 'varchar',
                'length' => 255,
            ),
        );

        $schema = array(
            'columns' => $columns,
            'indexes' => [],
        );
        return $schema;
    }
    public function isEmpty() {
        return empty($this->values['first_name']) && empty($this->values['last_name']);
    }
}