<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        //Given I have 2 users
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        // and statuses for them
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'My Status'
        ]);

         TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'His Status'
        ]);

        $statuses = $this->repo->getAllForUser($users[0]);

        $this->assertCount(2, $statuses);
        $this->assertEquals('My Status', $statuses[0]->body);
        $this->assertEquals('My Status', $statuses[1]->body);
    }

    /** @test */
    public function it_creates_a_status_for_user()
    {
        //Given unsaved status and existing user
        $status = TestDummy::create('Larabook\Statuses\Status', [
            'user_id' => null,
            'body' => 'My status'
        ]);

        $user = TestDummy::create('Larabook\Users\User');

        $savedStatus = $this->repo->save($status, $user->id);

        $this->tester->seeRecord('statuses', [
            'body' => 'My status',
        ]);

        $this->assertEquals($user->id, $savedStatus->user_id);
    }

}