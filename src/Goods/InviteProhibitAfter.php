<?php

namespace Mattoid\StoreInviteProhibit\Goods;

use Carbon\Carbon;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;
use Mattoid\Store\Goods\After;
use Mattoid\Store\Model\StoreModel;
use Mattoid\Store\Utils\ObjectsUtil;
use Illuminate\Contracts\Cache\Repository;
use Mattoid\StoreInvite\Model\InviteModel;
use Mattoid\StoreInvite\Utils\StringUtil;

class InviteProhibitAfter extends After
{

    /**
     * 后置事件，处理失败则自动回滚购买逻辑
     * @param User $user
     * @param StoreModel $store
     * @param $params
     * @return boolean true-处理成功 false-失败回滚
     */
    public static function after(User $user, StoreModel $store, $params) {
        return true;
    }
}
