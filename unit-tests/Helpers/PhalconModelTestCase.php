<?php
/**
 * PhalconModelTestCase.php
 * PhalconModelTestCase
 *
 * Model Test Helper
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

class PhalconModelTestCase extends PhalconUnitTestCase
{
    /**
     * Sets the test up by loading the DI container and other stuff
     */
    protected function setUp()
    {
        parent::setUp();

        // Set Models manager
        $this->_di->set('modelsManager', function() {
            return new \Phalcon\Mvc\Model\Manager();
        });

        // Set Models metadata
        $this->_di->set('modelsMetadata', function() {
            return new \Phalcon\Mvc\Model\Metadata\Memory();
        });

        // Set the connection to the db (defaults to mysql)
        $this->setDb();
    }

    /**
     * Sets the database adapter in the DI container
     *
     * @param string $dbType Sets the database type for the test
     */
    protected function setDb($dbType = 'mysql')
    {
        if ($this->_di->has('db'))
        {
            $db = $this->_di->get('db');
            if (get_class($db) == '\Phalcon\Db\Adapter\Pdo\\' . ucfirst($dbType))
            {
                return $db;
            }
        }
        // Set the connection to whatever we chose
        $this->_di->set(
            'db',
            function() use ($dbType)
            {
                $config = PhalconConfig::init();
                $params = $config['db'][$dbType];
                $class  = '\Phalcon\Db\Adapter\Pdo\\' . ucfirst($dbType);
                return new $class($params);
            }
        );
    }
}