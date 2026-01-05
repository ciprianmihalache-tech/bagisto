<?php

use function Pest\Laravel\get;

it('renders the admin login page with password field containing visibility toggle component', function () {
    // Act and Assert.
    get(route('admin.session.create'))
        ->assertOk()
        ->assertSee('v-password-visibility')
        ->assertSee('togglePasswordVisibility');
});

it('admin login page does not contain old JavaScript-based password toggle', function () {
    // Act and Assert.
    get(route('admin.session.create'))
        ->assertOk()
        ->assertDontSee('id="visibilityIcon"')
        ->assertDontSee('function switchVisibility()');
});

it('admin password visibility toggle has proper accessibility attributes', function () {
    // Act and Assert.
    get(route('admin.session.create'))
        ->assertOk()
        ->assertSee('role="button"')
        ->assertSee('tabindex="0"')
        ->assertSee('aria-label');
});

it('admin password visibility toggle has keyboard support', function () {
    // Act and Assert.
    get(route('admin.session.create'))
        ->assertOk()
        ->assertSee('@keyup.enter="togglePasswordVisibility"');
});

it('renders the admin forgot password page successfully', function () {
    // Act and Assert.
    get(route('admin.forget_password.create'))
        ->assertOk()
        ->assertSeeText(trans('admin::app.users.forget-password.title'));
});
