<?php

declare(strict_types=1);

namespace MangoSylius\InventoryUpdatePlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class MangoSyliusInventoryUpdatePlugin extends Bundle
{
    use SyliusPluginTrait;
}
