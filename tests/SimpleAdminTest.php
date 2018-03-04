<?php

namespace Merodiro\SimpleAdmin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Auth\User;

class SimpleAdminTest extends TestCase
{
    use DatabaseTransactions;

    public function testResponseForbiddenIfNotAdmin()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)
                         ->get('/_test');

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testResponseSuccessIfAdmin()
    {
        $user = factory(User::class)->make([
            'admin' => 1
        ]);

        $response = $this->actingAs($user)
                         ->get('/_test');

        $response->assertStatus(Response::HTTP_OK);
    }
}
