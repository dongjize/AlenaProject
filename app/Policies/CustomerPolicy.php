<?php

namespace App\Policies;

use App\AppointmentBooking;
use App\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(Customer $customer, AppointmentBooking $appointment)
    {
        return $customer->id == $appointment->customer_id;
    }
}
