<?php

namespace Ojs\ApiBundle\Tests\Controller;

use Ojs\CoreBundle\Tests\BaseTestCase;

/**
 * Class AnalyticsRestControllerTest
 * @package Ojs\ApiBundle\Tests\Controller
 */
class AnalyticsRestControllerTest extends BaseTestCase
{
    private $objectId = 1;
    private $entity = 'article';

    public function testPutObjectView()
    {
        $this->client->request(
            'PUT',
            '/api/analytics/view/'.$this->entity.'/'.$this->objectId,
            [
                'page_url' => '/articles/test',
            ],
            [],
            ['HTTP_ACCEPT' => 'application/json']
        );
        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());
    }

    public function testGetObjectView()
    {
        $this->client->request(
            'GET',
            '/api/analytics/view/'.$this->entity.'/'.$this->objectId.'/',
            [
                'apikey' => 'MWFlZDFlMTUwYzRiNmI2NDU3NzNkZDA2MzEyNzJkNTE5NmJmZjkyZQ==',
                'page_url' => '/articles/test',
            ],
            [],
            ['HTTP_ACCEPT' => 'application/json']
        );

        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());
    }

    public function testPutObjectDownload()
    {
        $this->client->request(
            'PUT',
            '/api/analytics/download/'.$this->entity.'/'.$this->objectId.'/?apikey=MWFlZDFlMTUwYzRiNmI2NDU3NzNkZDA2MzEyNzJkNTE5NmJmZjkyZQ==',
            [
                'file_path' => '/var/tests.tar.gz',
                'file_size' => '1024kb',
            ],
            [],
            ['HTTP_ACCEPT' => 'application/json']
        );
        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());
    }

    public function testGetObjectDownload()
    {
        $this->client->request(
            'GET',
            '/api/analytics/download/'.$this->entity.'/'.$this->objectId.'/',
            [
                'apikey' => 'MWFlZDFlMTUwYzRiNmI2NDU3NzNkZDA2MzEyNzJkNTE5NmJmZjkyZQ==',
                'file_path' => '/var/tests.tar.gz',
            ],
            [],
            ['HTTP_ACCEPT' => 'application/json']
        );

        $this->command("ojs:analytics:update", ['type' => 'download']);
        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());
    }
}
