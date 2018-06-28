<?php
// +----------------------------------------------------------------------
// | EventTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace SwoftTest\Db\Cases\Mysql;

use SwoftTest\Db\Cases\AbstractMysqlCase;
use SwoftTest\Db\Testing\Entity\User;

class EventTest extends AbstractMysqlCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testBeforeSave()
    {
        $user = new User();
        $user->fill([
            'name' => 'test.' . rand(0, 999),
            'roleId' => 1
        ]);

        $user->save();
        $this->assertEquals($user->getCreatedAt(), $user->getUpdatedAt());
    }

    public function testAfterSave()
    {
        $user = new User();
        $user->fill([
            'name' => 'test.' . rand(0, 999),
            'roleId' => 1
        ]);

        $user->save();
        $this->assertEquals(2, $user->getRoleId());
    }

    public function testBeforeUpdate()
    {
        $user = new User();
        $user->fill([
            'name' => 'test.' . rand(0, 999),
            'roleId' => 1
        ]);

        $user->save();
        $this->assertEquals($user->getCreatedAt(), $user->getUpdatedAt());

        sleep(1);
        $user->update();
        $this->assertNotEquals($user->getUpdatedAt(), $user->getCreatedAt());
    }

    public function testAfterDelete()
    {
        $user = new User();
        $user->fill([
            'name' => 'test.' . rand(0, 999),
            'roleId' => 1
        ]);

        $user->save();
        $this->assertEquals($user->getCreatedAt(), $user->getUpdatedAt());

        $user->delete();
        $this->assertEquals(0, $user->getRoleId());
    }
}