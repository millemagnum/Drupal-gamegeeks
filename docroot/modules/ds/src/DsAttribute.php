<?php

namespace Drupal\ds;

use Drupal\Core\Template\Attribute;

/**
 * Extends the core Attribute object.
 */
class DsAttribute extends Attribute {

  /**
   * Merges Attributes objects into another one.
   *
   * @return \Drupal\ds\DsAttribute;
   *   Merged attributes.
   */
  public function mergeAttributes() {
    $args = func_get_args();
    if ($args) {
      $merged_array = $this->toArray();
      foreach ($args as $arg) {
        if (is_object($arg)) {
          $merged_array = array_merge_recursive($merged_array, $arg->toArray());
        }
      }
      foreach ($merged_array as $attribute => $value) {
        $this->setAttribute($attribute, $value);
      }
    }
    return $this;
  }

}
