<?php

namespace Mattoid\StoreInviteProhibit\Goods;

use Mattoid\Store\Goods\Invalid;
use Mattoid\Store\Model\StoreCartModel;
use Mattoid\Store\Model\StoreModel;

class InviteProhibitInvalid extends Invalid
{

    public static function invalid(StoreModel $store, StoreCartModel $cart) {
        // 商品失效业务逻辑
    }
}
