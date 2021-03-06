<?php
namespace Poirot\AuthSystem\Authorize\Interfaces;

use Poirot\Core\Interfaces\iPoirotOptions;

/**
 * Each Permission has some resource
 * think of Permission check based on route name
 * or url, we can have a iAuthResource implementation
 * with setUrl(), setRouteName() options
 *
 * it will pass to permission method with role(identity)
 * combination
 *
 */
interface iAuthResource extends iPoirotOptions
{

} 