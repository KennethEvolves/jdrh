<?php

namespace Codeception\Lib\Interfaces;

interface SessionSnapshot
{
    /**
     * Saves current cookies into named snapshot in order to restore them in other tests
     * This is useful to save session state between tests.
     * For example, if user needs log in to site for each test this scenario can be executed once
     * while other tests can just restore saved cookies.
     *
     * ``` php
     * <?php
     * // inside AcceptanceTester class:
     *
     * public function login()
     * {
     *      // if snapshot exists - skipping login
     *      if ($I->loadSessionSnapshot('login')) return;
     *
     *      // logging in
     *      $I->amOnPage('/login');
     *      $I->fillField('name', 'jon');
     *      $I->fillField('password', '123345');
     *      $I->click('Login');
     *
     *      // saving snapshot
     *      $I->saveSessionSnapshot('login');
     * }
     * ```
     *
     * @return mixed
     */
    public function saveSessionSnapshot(string $name);

    /**
     * Loads cookies from a saved snapshot.
     * Allows to reuse same session across tests without additional login.
     *
     * See [saveSessionSnapshot](#saveSessionSnapshot)
     *
     * @return mixed
     */
    public function loadSessionSnapshot(string $name);

    /**
     * Deletes session snapshot.
     *
     * See [saveSessionSnapshot](#saveSessionSnapshot)
     *
     * @return mixed
     */
    public function deleteSessionSnapshot(string $name);
}
