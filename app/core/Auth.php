<?php

namespace App\core;

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

    public static function attempt(array $data)
    {
        $user = \R::getRow("SELECT * FROM users WHERE login=:login", [':login' => $data['login']]);

        if (!$user) {
            App::$app->session->set('errors', 'User not found');
        }

        if (!password_verify($data['password'], $user['password'])){
            App::$app->session->set('errors', 'Incorrect password');
        }

        if (!App::$app->session->has('errors')){
            self::login($user['id']);
            return true;
        }

        return false;
    }

    public static function logout(): void
    {
        App::$app->session->remove('AUTH_ID');
        (new Auth)->setIsAuthenticated(false);
    }

    public static function check(): bool
    {
        return (new Auth())->getIsAuthenticated();
    }
}