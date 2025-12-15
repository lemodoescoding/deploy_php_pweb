<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\View;

class Page
{
  public function home(): void
  {
    View::render('index');
  }

  public function login(): void
  {
    View::render('html/login');
  }

  public function register(): void
  {
    View::render('html/register');
  }

  public function dashboardUser(array $user): void
  {
    View::render('indexDashboardUser', [
      'user' => $user
    ]);
  }

  public function dashboardAdmin(array $user): void
  {
    View::render('indexDashboardAdmin', [
      'user' => $user
    ]);
  }

  public function forbidden(): void
  {
    View::error(403);
  }

  public function logout(array $user): void {}
}
