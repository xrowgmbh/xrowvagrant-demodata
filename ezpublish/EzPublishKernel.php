<?php
/**
 * File containing the EzPublishKernel class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

use Egulias\ListenersDebugCommandBundle\EguliasListenersDebugCommandBundle;
use eZ\Bundle\EzPublishDebugBundle\EzPublishDebugBundle;
use EzSystems\BehatBundle\EzSystemsBehatBundle;
use eZ\Bundle\EzPublishCoreBundle\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle;
use Sensio\Bundle\DistributionBundle\SensioDistributionBundle;

class EzPublishKernel extends Kernel
{
    /**
     * Returns an array of bundles to registers.
     *
     * @return array An array of bundle instances.
     *
     * @api
     */
    public function registerBundles()
    {
        $bundles = array(
            new Sylius\Bundle\InstallerBundle\SyliusInstallerBundle(),
            new Sylius\Bundle\OrderBundle\SyliusOrderBundle(),
            new Sylius\Bundle\MoneyBundle\SyliusMoneyBundle(),
            new Sylius\Bundle\CurrencyBundle\SyliusCurrencyBundle(),
            new Sylius\Bundle\ContactBundle\SyliusContactBundle(),
            new Sylius\Bundle\LocaleBundle\SyliusLocaleBundle(),
            new Sylius\Bundle\SettingsBundle\SyliusSettingsBundle(),
            new Sylius\Bundle\CartBundle\SyliusCartBundle(),
            new Sylius\Bundle\ProductBundle\SyliusProductBundle(),
            new Sylius\Bundle\VariationBundle\SyliusVariationBundle(),
            new Sylius\Bundle\AttributeBundle\SyliusAttributeBundle(),
            new Sylius\Bundle\TaxationBundle\SyliusTaxationBundle(),
            new Sylius\Bundle\ShippingBundle\SyliusShippingBundle(),
            new Sylius\Bundle\PaymentBundle\SyliusPaymentBundle(),
            new Sylius\Bundle\PayumBundle\SyliusPayumBundle(),
            new Sylius\Bundle\PromotionBundle\SyliusPromotionBundle(),
            new Sylius\Bundle\AddressingBundle\SyliusAddressingBundle(),
            new Sylius\Bundle\InventoryBundle\SyliusInventoryBundle(),
            new Sylius\Bundle\TaxonomyBundle\SyliusTaxonomyBundle(),
            new Sylius\Bundle\FlowBundle\SyliusFlowBundle(),
            new Sylius\Bundle\PricingBundle\SyliusPricingBundle(),
            new Sylius\Bundle\SequenceBundle\SyliusSequenceBundle(),
            new Sylius\Bundle\ContentBundle\SyliusContentBundle(),
            new Sylius\Bundle\TranslationBundle\SyliusTranslationBundle(),
            new Sylius\Bundle\ArchetypeBundle\SyliusArchetypeBundle(),

            new Sylius\Bundle\CoreBundle\SyliusCoreBundle(),
            new Sylius\Bundle\WebBundle\SyliusWebBundle(),
            new winzou\Bundle\StateMachineBundle\winzouStateMachineBundle(),
            new Sylius\Bundle\ResourceBundle\SyliusResourceBundle(),
            new Sylius\Bundle\ApiBundle\SyliusApiBundle(),

            new Sonata\BlockBundle\SonataBlockBundle(),
            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new Symfony\Cmf\Bundle\CreateBundle\CmfCreateBundle(),
            new Symfony\Cmf\Bundle\MediaBundle\CmfMediaBundle(),

            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),

            new Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new Payum\Bundle\PayumBundle\PayumBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new JMS\TranslationBundle\JMSTranslationBundle(),
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Tedivm\StashBundle\TedivmStashBundle(),
            new Hautelook\TemplatedUriBundle\HautelookTemplatedUriBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new FOS\HttpCacheBundle\FOSHttpCacheBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new FOS\OAuthServerBundle\FOSOAuthServerBundle(),
            new eZ\Bundle\EzPublishCoreBundle\EzPublishCoreBundle(),
            new eZ\Bundle\EzPublishLegacyBundle\EzPublishLegacyBundle( $this ),
            new eZ\Bundle\EzPublishIOBundle\EzPublishIOBundle(),
            new EzSystems\DemoBundle\EzSystemsDemoBundle(),
            new eZ\Bundle\EzPublishRestBundle\EzPublishRestBundle(),
            new EzSystems\CommentsBundle\EzSystemsCommentsBundle(),
            new EzSystems\NgsymfonytoolsBundle\EzSystemsNgsymfonytoolsBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),
            new Nelmio\CorsBundle\NelmioCorsBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Oneup\FlysystemBundle\OneupFlysystemBundle(),
        );
        if ( is_dir( realpath( dirname(__FILE__) . "/../vendor/xrow/ezpublish-solrdocs-bundle" ) ) )
        {
            $bundles[] = new xrow\EzPublishSolrDocsBundle\xrowEzPublishSolrDocsBundle();
        }
        if ( is_dir( realpath( dirname(__FILE__) . "/../vendor/ezsystems/platform-ui-bundle" ) ) )
        {
            $bundles[] = new EzSystems\PlatformUIBundle\EzSystemsPlatformUIBundle();
        }
        switch ( $this->getEnvironment() )
        {
            case "test":
            case "behat":
                $bundles[] = new EzSystemsBehatBundle();
                // No break, test also needs dev bundles
            case "dev":
                $bundles[] = new EzPublishDebugBundle();
                $bundles[] = new WebProfilerBundle();
                $bundles[] = new SensioDistributionBundle();
                $bundles[] = new SensioGeneratorBundle();
                $bundles[] = new EguliasListenersDebugCommandBundle();
        }

        return $bundles;
    }

    /**
     * Loads the container configuration
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     * @throws \RuntimeException when config file is not readable
     *
     * @api
     */
    public function registerContainerConfiguration( LoaderInterface $loader )
    {
        $environment = $this->getEnvironment();
        $loader->load( __DIR__ . '/config/config_' . $environment . '.yml' );
        $configFile = __DIR__ . '/config/ezpublish_' . $environment . '.yml';

        if ( !is_file( $configFile ) )
        {
            $configFile = __DIR__ . '/config/ezpublish_setup.yml';
        }

        if ( !is_readable( $configFile ) )
        {
            throw new RuntimeException( "Configuration file '$configFile' is not readable." );
        }

        $loader->load( $configFile );
    }
}
