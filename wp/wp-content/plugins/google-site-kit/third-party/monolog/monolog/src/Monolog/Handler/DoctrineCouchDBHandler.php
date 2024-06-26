<?php

declare (strict_types=1);
/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Google\Site_Kit_Dependencies\Monolog\Handler;

use Google\Site_Kit_Dependencies\Monolog\Logger;
use Google\Site_Kit_Dependencies\Monolog\Formatter\NormalizerFormatter;
use Google\Site_Kit_Dependencies\Monolog\Formatter\FormatterInterface;
use Google\Site_Kit_Dependencies\Doctrine\CouchDB\CouchDBClient;
/**
 * CouchDB handler for Doctrine CouchDB ODM
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
 */
class DoctrineCouchDBHandler extends \Google\Site_Kit_Dependencies\Monolog\Handler\AbstractProcessingHandler
{
    /** @var CouchDBClient */
    private $client;
    public function __construct(\Google\Site_Kit_Dependencies\Doctrine\CouchDB\CouchDBClient $client, $level = \Google\Site_Kit_Dependencies\Monolog\Logger::DEBUG, bool $bubble = \true)
    {
        $this->client = $client;
        parent::__construct($level, $bubble);
    }
    /**
     * {@inheritDoc}
     */
    protected function write(array $record) : void
    {
        $this->client->postDocument($record['formatted']);
    }
    protected function getDefaultFormatter() : \Google\Site_Kit_Dependencies\Monolog\Formatter\FormatterInterface
    {
        return new \Google\Site_Kit_Dependencies\Monolog\Formatter\NormalizerFormatter();
    }
}
