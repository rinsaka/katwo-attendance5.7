<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Professor;
use App\Admin;

class TopPageTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testExample()
  {
      $response = $this->get('/');

      $response->assertStatus(200);
  }

  public function testWelcomePage()
  {
    $response = $this->get('/')
                      ->assertSee('団員ログイン')
                      ->assertSee('管理者ログイン');
    $response->assertStatus(200);
  }

  public function testErrorPage()
  {
    $response = $this->get('/hoge');
    $response->assertStatus(404);
  }

  public function testLoginPage()
  {
    // ログインページ
    $response = $this->get('/login')
                      ->assertSee('Login ID')
                      ->assertSee('Password');
    $response->assertStatus(200);
  }

  public function testLoginAsUser()
  {

    $user = User::where('id', 1)->first();

    $response = $this->actingAs($user)
                      ->get('/home/')
                      ->assertSee('神戸常磐')
                      ->assertSee('KatWO メンバー');
  }

  public function testAdminLoginPage()
  {
    // ログインページ
    $response = $this->get('/admin/login')
                      ->assertSee('Login ID')
                      ->assertSee('Admin Login')
                      ->assertSee('Password');
    $response->assertStatus(200);
  }
  public function testLoginAsAdmin()
    {
      $admin = Admin::where('id', 1)->first();

      $response = $this->actingAs($admin, 'admin')  // ガードを変更
                        ->get('/admin/home/')
                        ->assertSee('logged in as admin!')
                        ->assertSee('KatWO 役員');
    }

}
