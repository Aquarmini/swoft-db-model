<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Xin\Swoft\Db\Pool;

use Swoft\Bean\Annotation\Pool;
use Swoft\Db\Pool\DbSlavePool as SwoftDbSlavePool;

/**
 * OtherDbSlavePool
 *
 * @Pool("dbModel.slave")
 */
class DbSlavePool extends SwoftDbSlavePool
{
    use CreateConnectionTrait;
}
