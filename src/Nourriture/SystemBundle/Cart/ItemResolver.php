<?php
namespace Nourriture\SystemBundle\Cart;

use Sylius\Bundle\CartBundle\Model\CartItemInterface;
use Sylius\Bundle\CartBundle\Resolver\ItemResolverInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Sylius\Bundle\CartBundle\Resolver\ItemResolvingException;

class ItemResolver implements ItemResolverInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function getProductRepository()
    {
        return $this->entityManager->getRepository('SystemBundle:Product');
    }
    public function resolve(CartItemInterface $item, Request $request)
    {
	$productId = $request->query->get('id');

        // If no product id given, or product not found, we throw exception with nice message.
        if (!$productId || !$product = $this->getProductRepository()->find($productId)) {
            throw new ItemResolvingException('Requested product was not found');
        }

        // Assign the product to the item and define the unit price.
        $item->setProduct($product);
	#var_dump((INT)$product->getPrice()*100);
#var_dump($product);
#die(__FILE__.__LINE__);

        $item->setUnitPrice((INT)$product->getPrice()*100);

        // Everything went fine, return the item.
        return $item;
    }
}
