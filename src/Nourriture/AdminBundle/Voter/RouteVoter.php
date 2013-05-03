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
#print_r(count($url_array));
#die(__FILE__.__LINE__);
	$_m_url = $m_url_array[count($m_url_array)-1];
	$_url   = $url_array[count($url_array)-1];


       if (count($url_array) < 4 && $_m_url === $_url && $url_array[count($url_array)] === $m_url_array[count($m_url_array)] ) {
            return true;
        }elseif(count($url_array)>4 && $url_array[count($url_array)-1] === $m_url_array[count($m_url_array)-1] && $url_array[count($url_array)-2] === $m_url_array[count($m_url_array)-2] ){
	#die($m_url_array[count($m_url_array)-2] . __FILE__.__LINE__);
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
