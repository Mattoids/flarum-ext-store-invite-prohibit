<?php

namespace Mattoid\StoreInviteProhibit\Goods;

use Flarum\User\User;
use Mattoid\Store\Goods\After;
use Mattoid\Store\Model\StoreModel;

class InviteProhibitAfter extends After
{

    /**
     * 后置事件，处理失败则自动回滚购买逻辑
     *
     * 前置校验（InviteProhibitValidate）永远抛异常，本方法实际不可达；
     * 这里兜底同样禁止购买成功，避免配置变更后静默放行。
     *
     * @param User $user
     * @param StoreModel $store
     * @param $params
     * @return boolean true-处理成功 false-失败回滚
     */
    public static function after(User $user, StoreModel $store, $params) {
        return false;
    }
}
