<?php

declare(strict_types=1);

namespace MangoSylius\UpdateInventoryPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class MangoSyliusUpdateInventoryPlugin extends Bundle
{
    use SyliusPluginTrait;
}
