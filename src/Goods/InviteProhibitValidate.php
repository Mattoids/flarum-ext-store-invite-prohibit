<?php

namespace Mattoid\StoreInviteProhibit\Goods;

use Carbon\Carbon;
use Flarum\Foundation\ValidationException;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\Exception\PermissionDeniedException;
use Flarum\User\User;
use Illuminate\Contracts\Cache\Repository;
use Mattoid\Store\Goods\Validate;
use Mattoid\Store\Model\StoreModel;
use Mattoid\StoreInvite\Model\InviteModel;
use Symfony\Contracts\Translation\TranslatorInterface;

class InviteProhibitValidate extends Validate
{

    /**
     * 前置校验，用于购买商品前验证用户是否允许购买等逻辑
     * @param User $user
     * @param StoreModel $store
     * @param $params
     * @return true
     * @throws PermissionDeniedException
     */
    public static function validate(User $user, StoreModel $store, $params) {
        if (!$user->can('mattoid-store-invite.group-view')) {
            throw new PermissionDeniedException();
            return false;
        }

        $groupIds = array_column(json_decode(json_encode($user->groups)), 'id');
        if ($user->can('mattoid-store-invite.group-blacklist-view') && !in_array('1', $groupIds)) {
            throw new PermissionDeniedException();
            return false;
        }

        $translator = resolve(TranslatorInterface::class);

        throw new ValidationException(['message' => $translator->trans('mattoid-store-invite-prohibit.forum.error.prohibit-buy')]);


        return true;
    }
}
