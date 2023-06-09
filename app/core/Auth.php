<?php

namespace App\core;

use App\models\User;

class Auth
{

    private bool $isAuthenticated = false;

    /**
     * @return bool
     */
    public function getIsAuthenticated(): bool
    {
        return $this->isAuthenticated;
    }

    /**
     * @param bool $isAuthenticated
     */
    public function setIsAuthenticated(bool $isAuthenticated): void
    {
        $this->isAuthenticated = $isAuthenticated;
    }

    public static function login(string $id): void
    {
        App::$app->session->set('AUTH_ID', $id);
        (new Auth)->setIsAuthenticated(true);
    }

    public static function attempt(array $data): bool
    {
        $user = User::query()->first("login=" . $data['login']);

        if (!$user) {
            App::$app->session->set('errors', ['User not found']);
        }

        if (!password_verify($data['password'], $user['password'])){
            App::$app->session->set('errors', ['Incorrect password']);
        }

        if (App::$app->session->has('errors')){
            return false;
        }

        self::login($user['id']);

        return true;
    }

    public static function logout(): void
    {
        App::$app->session->remove('AUTH_ID');
        (new Auth)->setIsAuthenticated(false);
    }

    public static function check(): bool
    {
        return isset($_SESSION['AUTH_ID']) ? intval($_SESSION['AUTH_ID']) : false;
    }
}