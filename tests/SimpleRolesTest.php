<?php

namespace Merodiro\SimpleRoles;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Merodiro\SimpleRoles\Models\User;

class SimpleRolesTest extends TestCase
{
    use DatabaseTransactions;

    public function testResponseForbiddenIfUserHasNoRole()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)
            ->get('/_admin');

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $response = $this->actingAs($user)
            ->get('/_manger');

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testResponseForbiddenIfGuest()
    {
        $response = $this->get('/_admin');

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $response = $this->get('/_manger');

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testResponseSuccessIfAdmin()
    {
        $user = factory(User::class)->make();

        $user->setRole('admin');

        $response = $this->actingAs($user)
                         ->get('/_admin');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testResponseForbiddenIFAdminTryAccessManger()
    {
        $user = factory(User::class)->make();

        $user->setRole('admin');

        $response = $this->actingAs($user)
            ->get('/_manger');

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testResponseForbiddenIfRoleRemoved()
    {
        $user = factory(User::class)->make();

        $user->setRole('admin');
        $user->removeRole();

        $response = $this->actingAs($user)
            ->get('/_admin');

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
