<?php

namespace KaiKorla\ContaoEventFormOptions;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class ContaoManagerPlugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoEventFormOptions::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}
