<?php

namespace Nourriture\AdminBundle\Voter;

use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\Voter\VoterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Voter based on the uri
 */
class RouteVoter implements VoterInterface
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Checks whether an item is current.
     *
     * If the voter is not able to determine a result,
     * it should return null to let other voters do the job.
     *
     * @param ItemInterface $item
     * @return boolean|null
     */
    public function matchItem(ItemInterface $item)
    {

	$m_url = $item->getUri();
	$url   = $this->container->get('request')->getRequestUri();

	$m_url_array =  array_filter(explode('/', $m_url));
	$url_array =  array_filter(explode( '/', $url));

	$_m_url = $m_url_array[count($m_url_array)-1];
	$_url   = $url_array[count($url_array)-1];

#	print $_m_url . " => " . $_url . "<br />";

#        print_r(array_filter($url_array));
#        die(__FILE__.__LINE__);

       #if ($item->getUri() === $this->container->get('request')->getRequestUri()) {
       if ($_m_url === $_url && $url_array[count($url_array)] === $m_url_array[count($m_url_array)] ) {
       #if ($_m_url === $_url || $url_array[count($url_array)] === $m_url_array[count($m_url_array)] ) {
            return true;
        }

#print_r($m_url_array);
	
#die($_url . __FILE__.__LINE__);
	#elseif (preg_match('/' . $m_url_array[2] . '\/' . $m_url_array[3] . '/i', $item->getUri())){
	#	return true;
	#}
	
        return null;
    }
}
