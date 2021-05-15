<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserOrderPolicy
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

    public function accept(User $user)
    {
        return $user->type == 1;
    }

    public function view(User $user, UserOrder $order)
    {
        // 只有 下單人、送或者、店家 才有權限 review
        return Shop::findOrFail($order->shop_id)->user_id == $user->id ||
                $order->user_id == $user->id ||
                $order->delivery_id == $user->id;
    }
}
