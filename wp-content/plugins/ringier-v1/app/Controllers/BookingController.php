<?php
namespace RVN\Controllers;

use RVN\Models\Booking;

class BookingController extends _BaseController
{
    private static $instance;


    protected function __construct()
    {
        parent::__construct();

        add_action("wp_ajax_ajax_handler_booking", [$this, "ajaxHandler"]);
        add_action("wp_ajax_nopriv_ajax_handler_booking", [$this, "ajaxHandler"]);
    }


    public static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new BookingController();
        }

        return self::$instance;
    }


    public function ajaxAddToCart($data)
    {
        $model = Booking::init();
        $rs = $model->addToCart($data);
        if ($rs) {
            $result = [
                'status' => 'success',
                'data'   => $rs
            ];
        }
    }


    public function getBookingInfo($journey_id)
    {
        $model = Booking::init();
        $result = $model->getBookingInfo($journey_id);

        return $result;
    }


    public function isRoomBooked($journey_id, $room_id)
    {
        $model = Booking::init();
        $result = $model->isRoomBooked($journey_id, $room_id);

        return $result;
    }

}