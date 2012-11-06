<?php
/**
 * PostgresqlTest.php
 * Mvc_Model_Calculation_PostgresqlTest
 *
 * Tests the \Phalcon\Mvc\Model calculations
 *
 * PhalconPHP Framework
 *
 * @copyright (c) 2011-2012 Phalcon Team
 * @link      http://www.phalconphp.com
 * @author    Andres Gutierrez <andres@phalconphp.com>
 * @author    Eduar Carvajal <eduar@phalconphp.com>
 * @author    Nikolaos Dimopoulos <nikos@niden.net>
 *
 * The contents of this file are subject to the New BSD License that is
 * bundled with this package in the file docs/LICENSE.txt
 *
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world-wide-web, please send an email to license@phalconphp.com
 * so that we can send you a copy immediately.
 */

class Mvc_Model_Calculation_PostgresqlTest extends Mvc_Model_Calculation_Helper_Model
{
    public function setUp()
    {
        parent::setUp();

        $this->setDb('postgresql');

    }
}