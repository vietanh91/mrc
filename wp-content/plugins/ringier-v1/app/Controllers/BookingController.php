<?php
namespace RVN\Controllers;

use RVN\Models\Addon;
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


    public function ajaxSaveCart($data)
    {
        $this->validate->rule('required', ['journey_id', 'room_id', 'type']);

        if ($this->validate->validate()) {
            $model = Booking::init();
            $rs = $model->saveCart($data);
            if (!empty($rs)) {
                $result = [
                    'status' => 'success',
                    'data'   => $rs
                ];
            }
        }
        else {
            $result = [
                'status' => 'fail',
                'data'   => ['Error occurred, please try again.']
            ];
        }

        return valueOrNull($result, []);
    }


    public function ajaxSwitchAddonStatus($data)
    {
        $addon_model = Addon::init();
        $rs = $addon_model->switchAddonStatus($data['cart_id'], $data['object_id']);

        if (!empty($rs)) {
            if (!is_array($rs)) {
                $result = [
                    'status' => 'success',
                    'data'   => $rs
                ];
            }
            else {
                $result = $rs;
            }
        }
        else {
            $result = [
                'status' => 'fail',
                'data'   => [$rs]
            ];
        }

        return $result;
    }


    public function ajaxSaveAddon($data)
    {
        $this->validate->rule('required', ['addon_type', 'action_type', 'object_id']);

        if ($this->validate->validate()) {
            $model = Addon::init();
            $rs = $model->saveAddon($data);
            if (!empty($rs)) {
                $result = [
                    'status' => 'success',
                    'data'   => $rs
                ];
            }
        }
        else {
            $result = [
                'status' => 'fail',
                'data'   => ['Error occurred, please try again.']
            ];
        }

        return valueOrNull($result, []);
    }


    public function ajaxCheckCartEmpty($data)
    {
        $model = Booking::init();
        $rs = $model->getCartInfo($data['user_id'], $data['journey_id']);

        if (!empty($rs['total'])) {
            return [
                'status' => 'success',
                'data'   => $rs
            ];
        }
        else {
            return [
                'status' => 'fail',
                'data'   => ['Please select room to continue.']
            ];
        }
    }


    public function getCartItems($user_id, $journey_id)
    {
        $model = Booking::init();
        $result = $model->getCartItems($user_id, $journey_id);

        return $result;
    }


    public function ajaxGetCart($data)
    {
        $model = Booking::init();
        $rs = $model->getCartInfo($data['user_id'], $data['journey_id']);

        return [
            'status' => 'success',
            'data'   => $rs
        ];
    }


    public function ajaxSaveAdditionalInformation($data)
    {
        $model = Booking::init();
        $rs = $model->saveAdditionalInformation($data['cart_id'], $data['additional_information'], $data['billing_address']);

        return [
            'status' => 'success',
            'data'   => $rs
        ];
    }


    public function getBookedRoom($journey_id)
    {
        $model = Booking::init();
        $result = $model->getBookedRoom($journey_id);

        return $result;
    }


    public function isRoomBooked($journey_id, $room_id)
    {
        $model = Booking::init();
        $result = $model->isRoomBooked($journey_id, $room_id);

        return $result;
    }


    public function bookingAddOn()
    {

        view('booking/booking_addon');
    }


    public function bookingReview()
    {

        view('booking/review');
    }


    public function bookingPaymentReturn()
    {
        view('booking/return');
    }


    public function yourBooking()
    {
        view('booking/your_booking');
    }
}
