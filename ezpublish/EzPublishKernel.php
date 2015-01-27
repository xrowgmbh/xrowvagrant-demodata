<?php
/**
 * File containing the EzPublishKernel class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

use Egulias\ListenersDebugCommandBundle\EguliasListenersDebugCommandBundle;
use eZ\Bundle\EzPublishCoreBundle\EzPublishCoreBundle;
use eZ\Bundle\EzPublishDebugBundle\EzPublishDebugBundle;
use eZ\Bundle\EzPublishIOBundle\EzPublishIOBundle;
use eZ\Bundle\EzPublishLegacyBundle\EzPublishLegacyBundle;
use eZ\Bundle\EzPublishRestBundle\EzPublishRestBundle;
use EzSystems\CommentsBundle\EzSystemsCommentsBundle;
use EzSystems\DemoBundle\EzSystemsDemoBundle;
use EzSystems\BehatBundle\EzSystemsBehatBundle;
use eZ\Bundle\EzPublishCoreBundle\Kernel;
use EzSystems\NgsymfonytoolsBundle\EzSystemsNgsymfonytoolsBundle;
use FOS\HttpCacheBundle\FOSHttpCacheBundle;
use FOS\RestBundle\FOSRestBundle;
use FOS\OAuthServerBundle\FOSOAuthServerBundle;
use Liip\ImagineBundle\LiipImagineBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\AsseticBundle\AsseticBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle;
use Sensio\Bundle\DistributionBundle\SensioDistributionBundle;
use Tedivm\StashBundle\TedivmStashBundle;
use WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle;
use WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle;
use Nelmio\CorsBundle\NelmioCorsBundle;
use Hautelook\TemplatedUriBundle\HautelookTemplatedUriBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Knp\Bundle\MenuBundle\KnpMenuBundle;
use Oneup\FlysystemBundle\OneupFlysystemBundle;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use JMS\SerializerBundle\JMSSerializerBundle;
use Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Bundle\AttributeBundle\SyliusAttributeBundle;
use Sylius\Bundle\ProductBundle\SyliusProductBundle;
use Sylius\Bundle\MoneyBundle\SyliusMoneyBundle;
use Sylius\Bundle\OrderBundle\SyliusOrderBundle;
use Sylius\Bundle\CartBundle\SyliusCartBundle;
use Sylius\Bundle\AddressingBundle\SyliusAddressingBundle;
use Sylius\Bundle\TaxationBundle\SyliusTaxationBundle;
use Sylius\Bundle\PromotionBundle\SyliusPromotionBundle;
use Sylius\Bundle\SettingsBundle\SyliusSettingsBundle;
use Sylius\Bundle\InstallerBundle\SyliusInstallerBundle;
use Sylius\Bundle\CurrencyBundle\SyliusCurrencyBundle;
use Sylius\Bundle\LocaleBundle\SyliusLocaleBundle;
use Sylius\Bundle\VariationBundle\SyliusVariationBundle;
use Sylius\Bundle\ShippingBundle\SyliusShippingBundle;
use Sylius\Bundle\PaymentBundle\SyliusPaymentBundle;
use Sylius\Bundle\TaxonomyBundle\SyliusTaxonomyBundle;
use Sylius\Bundle\FlowBundle\SyliusFlowBundle;
use Sylius\Bundle\PricingBundle\SyliusPricingBundle;
use Sylius\Bundle\ContentBundle\SyliusContentBundle;
use Sylius\Bundle\CoreBundle\SyliusCoreBundle;
use Sylius\Bundle\WebBundle\SyliusWebBundle;
use Sylius\Bundle\ApiBundle\SyliusApiBundle;

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
            new FrameworkBundle(),
            new SecurityBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new SwiftmailerBundle(),
            new AsseticBundle(),
            new DoctrineBundle(),
            new SensioFrameworkExtraBundle(),
            new TedivmStashBundle(),
            new HautelookTemplatedUriBundle(),
            new LiipImagineBundle(),
            new FOSHttpCacheBundle(),
            new FOSRestBundle(),
            new FOSOAuthServerBundle(),
            new EzPublishCoreBundle(),
            new EzPublishLegacyBundle( $this ),
            new EzPublishIOBundle(),
            new EzSystemsDemoBundle(),
            new EzPublishRestBundle(),
            new EzSystemsCommentsBundle(),
            new EzSystemsNgsymfonytoolsBundle(),
            new WhiteOctoberPagerfantaBundle(),
            new WhiteOctoberBreadcrumbsBundle(),
            new NelmioCorsBundle(),
            new KnpMenuBundle(),
            new OneupFlysystemBundle(),
            new JMSSerializerBundle( $this ),
            new StofDoctrineExtensionsBundle(),
            new SyliusAttributeBundle(),
            new SyliusApiBundle(),
            new SyliusResourceBundle(),
            new SyliusProductBundle(),
            new SyliusMoneyBundle(),
            new SyliusOrderBundle(),
            new SyliusCartBundle(),
            new SyliusAddressingBundle(),
            new SyliusTaxationBundle(),
            new SyliusSettingsBundle(),
            new SyliusInstallerBundle(),
            new SyliusCurrencyBundle(),
            new SyliusLocaleBundle(),
            new SyliusVariationBundle(),
            new SyliusShippingBundle(),
            new SyliusPaymentBundle(),
            new SyliusPromotionBundle(),
            new SyliusTaxonomyBundle(),
            new SyliusFlowBundle(),
            new SyliusPricingBundle(),
            new SyliusContentBundle(),
            new SyliusCoreBundle(),
            new SyliusWebBundle()
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
