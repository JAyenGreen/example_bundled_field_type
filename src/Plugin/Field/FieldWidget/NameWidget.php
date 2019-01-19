<?php
namespace Drupal\name_field_type\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Plugin implementation of the 'NameFieldTypeDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "name_widget",
 *   label = @Translation("Name Field Type Default Widget"),
 *   description = @Translation("Name Field Type Default Widget"),
 *   field_types = {
 *     "name",
 *   }
 * )
 */
class NameWidget extends WidgetBase
{

    /**
     * {@inheritdoc}
     */

    public function formElement(
        FieldItemListInterface $items,
        $delta,
        array $element,
        array &$form,
        FormStateInterface $form_state
    )
    {

        $title_options = [
            'Mr' => 'Mr',
            'Mrs' => 'Mrs',
            'Ms' => 'Ms',
            'Miss' => 'Miss',
            'Bhp' => 'Bhp',
            'Dr' => 'Dr',
            'Fr' => 'Fr',
            'J' => 'J',
            'Msgr' => 'Msgr',
            'Prof' => 'Prof',
            'Rep' => 'Rep',
            'Rabbi' => 'Rabbi',
            'Rev' => 'Rev',
            'Sen' => 'Sen',
        ];
        $suffix_options = [
            'Jr' => 'Jr',
            'Sr' => 'Sr',
            'II' => 'II',
            'III' => 'III',
            'IV' => 'IV',
            'Esq' => 'Esq',
        ];

        $element['title'] = [
            '#type' => 'select',
            '#title' => t('Title'),
            '#options' => $title_options,
            '#default_value' => isset($items[$delta]->title) ? $items[$delta]->title : NULL,
        ];

        $element['first_name'] = [
            '#type' => 'textfield',
            '#title' => t('First name'),
            '#default_value' => isset($items[$delta]->first_name) ? $items[$delta]->first_name : NULL,
            '#size' => 40,
        ];

        $element['middle_name'] = [
            '#type' => 'textfield',
            '#title' => t('Middle name'),
            '#default_value' => isset($items[$delta]->middle_name) ? $items[$delta]->middle_name : NULL,
            '#size' => 40,
        ];

        $element['last_name'] = [
            '#type' => 'textfield',
            '#title' => t('Last name'),
            '#default_value' => isset($items[$delta]->last_name) ? $items[$delta]->last_name : NULL,
            '#size' => 40,
        ];

        $element['maternal_last_name'] = [
            '#type' => 'textfield',
            '#title' => t('Maternal last name'),
            '#default_value' => isset($items[$delta]->maternal_last_name) ? $items[$delta]->maternal_last_name : NULL,
            '#size' => 60,
        ];

        $element['suffix'] = [
            '#type' => 'select',
            '#title' => t('Suffix'),
            '#options' => $suffix_options,
            '#default_value' => isset($items[$delta]->suffix) ? $items[$delta]->suffix : NULL,
        ];
        return $element;
    }
}
