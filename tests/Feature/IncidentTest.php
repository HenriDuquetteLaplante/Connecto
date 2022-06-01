<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncidentTest extends TestCase
{
    use RefreshDatabase;


    public function test_user_can_access_incidents_index()
    {
        $reponse = $this->
                   get(route('admin.incidents.index'));

        $reponse->assertStatus(200);
        $reponse->assertSeeText('nouvel incident');
    }

}
