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

}
