<?php

// use strict typing because php is actually loosely typed on its own
declare(strict_types=1);

// define the namesapce to match the directory structure
namespace Drupal\anytown\Controller;

// extend the core-provided ControllerBase to get access to its utility methods
use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for anytown.weather_page route.
 */
class WeatherPage extends ControllerBase {

  /**
   * Builds the response. (i.e., returns the content to display)
   * Defines the param style as a strictly typed string.
   */
  public function build(string $style): array {
    // Style should be one of 'short', or 'extended', otherwise default to 'short'.
    $style = (in_array($style, ['short', 'extended'])) ? $style : 'short';

    $build['content'] = [
      '#type' => 'markup',
      '#markup' => '<p>The weather forecast for this week is sunny with a chance of meatballs.</p>',
    ];

    // This just adds to the build array, it doesn't replace it
    // So both the above <p> and the below <p> will be shown when /weather/extended
    if ($style === 'extended') {
      $build['content_extended'] = [
        '#type' => 'markup',
        '#markup' => '<p><strong>Extended forecast:</strong> Looking ahead to next week we expect some snow.</p>',
      ];
    }

    return $build;
  }

}
