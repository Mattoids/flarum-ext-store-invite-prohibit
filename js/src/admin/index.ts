import app from 'flarum/admin/app';

app.initializers.add('mattoid/flarum-ext-store-invite-prohibit', () => {
  app.extensionData.for("mattoid-store-invite-prohibit")
    .registerPermission(
      {
        icon: 'fas fa-id-card',
        label: app.translator.trans('mattoid-store-invite-prohibit.admin.settings.group-view'),
        permission: 'mattoid-store-invite-prohibit.group-view',
        allowGuest: true
      }, 'view')
});
