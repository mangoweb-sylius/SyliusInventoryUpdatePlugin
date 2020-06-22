<?php

declare(strict_types=1);

namespace MangoSylius\InventoryUpdatePlugin\Controller;

use Sylius\Bundle\CoreBundle\Controller\ProductVariantController as BaseProductVariantController;
use Sylius\Component\Core\Model\ProductTaxonInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Contracts\Translation\TranslatorInterface;

class MangoProductVariantController extends BaseProductVariantController
{
    public function saveInventoryAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);
        $productVariantOnStock = $request->get('productVariants');

        if ($configuration->isCsrfProtectionEnabled() && !$this->isCsrfTokenValid('update-inventory', $request->request->get('_csrf_token'))) {
            throw new HttpException(Response::HTTP_FORBIDDEN, 'Invalid csrf token.');
        }

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true) && null !== $productVariantOnStock) {
            /** @var ProductTaxonInterface $productTaxon */
            foreach ($productVariantOnStock as $id => $newOnHand) {
                $newOnHand = (int) $newOnHand;
                /** @var ProductVariantInterface $productVariant */
                $productVariant = $this->repository->findOneBy(['id' => $id]);
                if ($productVariant->isTracked()) {
                    if ($productVariant->getOnHold() > 0) {
                        $newOnHand = max($productVariant->getOnHold(), $newOnHand);
                    }
                    $productVariant->setOnHand($newOnHand);
                }
            }
            $this->manager->flush();

            /** @var Session $session */
            $session = $request->getSession();
            $translator = $this->container->get('translator');
            assert($translator instanceof TranslatorInterface);
            $session->getFlashBag()->add('success', $translator->trans('mango-sylius.admin.inventory.saved'));
        }

        return $this->redirectHandler->redirectToReferer($configuration);
    }
}
