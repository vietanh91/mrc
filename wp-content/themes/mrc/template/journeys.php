<?php
/**
 * Template name: Journey List
 */

$get_params = $_GET;
unset($get_params['q']);
if (empty($get_params)) {
    $journey_ctrl = \RVN\Controllers\JourneyTypeController::init();
    $journey_ctrl->journeyTypeList();
} else {
    $journey_ctrl = \RVN\Controllers\JourneyController::init();
    $journey_ctrl->journeyList($_GET);
}