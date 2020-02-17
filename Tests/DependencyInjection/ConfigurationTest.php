<?php

namespace CL\Bundle\SlackBundle\Tests\DependencyInjection;

use CL\Bundle\SlackBundle\DependencyInjection\CLSlackExtension;
use CL\Bundle\SlackBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;
    /**
     * @test
     */
    public function it_can_not_be_valid_with_an_api_token_of_the_wrong_type()
    {
        $this->assertConfigurationIsInvalid([
            [
                'api_token' => [],
            ]
        ], 'api_token');

        $this->assertConfigurationIsInvalid([
            [
                'api_token' => new \stdClass(),
            ]
        ], 'api_token');
    }

    /**
     * {@inheritdoc}
     */
    protected function getConfiguration(): ConfigurationInterface
    {
        return new Configuration();
    }

    /**
     * @inheritDoc
     */
    protected function getContainerExtension(): ExtensionInterface
    {
        return new CLSlackExtension();
    }
}
