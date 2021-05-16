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

    public function accept(User $user, UserOrder $order)
    {
        return $user->type == 1 && $order->status == 1;
    }

    public function cook(User $user, UserOrder $order)
    {
        return $user->type == 2 && Shop::findOrFail($order->shop_id)->user_id == $user->id  && $order->status == 2;
    }

    public function wait(User $user, UserOrder $order)
    {
        return $user->type == 2 && Shop::findOrFail($order->shop_id)->user_id == $user->id  && $order->status == 3;
    }

    public function deliver(User $user, UserOrder $order)
    {
        return $user->type == 1 && $order->delivery_id == $user->id && $order->status == 4;
    }

    public function arrive(User $user, UserOrder $order)
    {
        return $user->type == 1 && $order->delivery_id == $user->id && $order->status == 5;
    }

    public function finish(User $user, UserOrder $order)
    {
        return $order->user_id == $user->id && $order->status == 6;
    }

    public function cancel(User $user, UserOrder $order)
    {
        return $order->user_id == $user->id && $order->status <=2;
    }

    public function view(User $user, UserOrder $order)
    {
        // 只有 下單人、送或者、店家 才有權限 review
        return Shop::findOrFail($order->shop_id)->user_id == $user->id ||
                $order->user_id == $user->id ||
                $order->delivery_id == $user->id;
    }
}
