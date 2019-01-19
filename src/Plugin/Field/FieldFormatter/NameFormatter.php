<?php
namespace Drupal\name_field_type\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
/**
 * Plugin implementation of the 'name_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "name_formatter",
 *   label = @Translation("Name Field Type Formatter"),
 *   field_types = {
 *     "name"
 *   }
 * )
 */
class NameFormatter extends FormatterBase {
    public function viewElements(FieldItemListInterface $items, $langcode) {
        $element = [];
        foreach ($items as $delta => $item) {
            $name = [];
            if ($item->title) $name[] = $item->title;
            if ($item->first_name) $name[] = $item->first_name;
            if ($item->middle_name) $name[] = $item->middle_name;
            if ($item->last_name) $name[] = $item->last_name;
            if ($item->maternal_last_name) $name[] = $item->maternal_last_name;
            if ($item->suffix) $name[] = $item->suffix;
            $element[$delta] = [
                'name' => ['#markup' => implode(' ', $name)],
                '#theme' => 'name_field_type',
            ];
        }
        return $element;
    }
}