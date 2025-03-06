<?php

/*
 * This file is part of mattoid/flarum-ext-store-invite-prohibit.
 *
 * Copyright (c) 2025 mattoid.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
//
use Flarum\Api\Serializer\BasicUserSerializer;
use Flarum\Extend;
use Mattoid\Store\Extend\StoreExtend;
use Mattoid\StoreInviteProhibit\Attributes\UserAttributes;
use Mattoid\StoreInviteProhibit\Goods\InviteProhibitAfter;
use Mattoid\StoreInviteProhibit\Goods\InviteProhibitGoods;
use Mattoid\StoreInviteProhibit\Goods\InviteProhibitInvalid;
use Mattoid\StoreInviteProhibit\Goods\InviteProhibitValidate;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),
    new Extend\Locales(__DIR__.'/locale'),

    (new StoreExtend('inviteProhibit'))
        // Register product information
        ->addStoreGoods(InviteProhibitGoods::class)
        // Register pre-validation
        ->addValidate(InviteProhibitValidate::class)
        // Register business logic of the product
        ->addAfter(InviteProhibitAfter::class)
        // Product invalidation logic
        ->addInvalid(InviteProhibitInvalid::class),

    (new Extend\ApiSerializer(BasicUserSerializer::class))
        ->attributes(UserAttributes::class),
];
