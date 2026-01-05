<?php

use function Pest\Laravel\get;

it('renders the login page with password field containing visibility toggle component', function () {
    // Act and Assert.
    get(route('shop.customer.session.index'))
        ->assertOk()
        ->assertSee('v-password-visibility')
        ->assertSee('togglePasswordVisibility');
});

it('renders the registration page with password fields containing visibility toggle component', function () {
    // Act and Assert.
    get(route('shop.customers.register.index'))
        ->assertOk()
        ->assertSee('v-password-visibility')
        ->assertSee('togglePasswordVisibility');
});

it('renders the forgot password page successfully', function () {
    // Act and Assert.
    get(route('shop.customers.forgot_password.create'))
        ->assertOk()
        ->assertSeeText(trans('shop::app.customers.forgot-password.page-title'));
});

it('login page does not contain old checkbox-based password toggle', function () {
    // Act and Assert.
    get(route('shop.customer.session.index'))
        ->assertOk()
        ->assertDontSee('id="show-password"')
        ->assertDontSee('switchVisibility()');
});

it('password visibility toggle has proper accessibility attributes', function () {
    // Act and Assert.
    get(route('shop.customer.session.index'))
        ->assertOk()
        ->assertSee('role="button"')
        ->assertSee('tabindex="0"')
        ->assertSee('aria-label');
});

it('password visibility toggle has keyboard support', function () {
    // Act and Assert.
    get(route('shop.customer.session.index'))
        ->assertOk()
        ->assertSee('@keyup.enter="togglePasswordVisibility"');
});
