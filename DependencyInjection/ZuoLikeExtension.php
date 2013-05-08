<?php

namespace Zuo\LikeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ZuoLikeExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if (!in_array(strtolower($config['db_driver']), array('mongodb', 'orm'))) {
            throw new \InvalidArgumentException(sprintf('Invalid db driver "%s".', $config['db_driver']));
        }
        $loader->load(sprintf('%s.xml', $config['db_driver']));


        $container->setParameter('zuo_like.model_manager_name', $config['model_manager_name']);

        if ('mongodb' === $config['db_driver']) {
            if (null === $config['model_manager_name']) {
                $container->setAlias('zuo_like.document_manager', new Alias('doctrine.odm.mongodb.document_manager', false));
            } else {
                $container->setAlias('zuo_like.document_manager', new Alias(sprintf('doctrine.odm.%s_mongodb.document_manager', $config['model_manager_name']), false));
            }
        }
    }
}
