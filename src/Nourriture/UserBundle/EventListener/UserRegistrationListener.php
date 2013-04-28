<?php
namespace Nourriture\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManager;

/**
 * Listener responsible to change the redirection at the end of the password resetting
 */
class UserRegistrationListener implements EventSubscriberInterface
{
    protected $em;
    protected $user;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $this->user = $event->getForm()->getData();
        $group_name = 'Users';
        $entity = $this->em->getRepository('UserBundle:Group')->findOneByName($group_name); // You could do that by Id, too
        $this->user->addGroup($entity);
        $this->em->flush();

    }
}
