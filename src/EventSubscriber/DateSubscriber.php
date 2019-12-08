<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Blog;
use App\Entity\BlogComment;
use App\Entity\PublishedDateInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class DateSubscriber implements EventSubscriberInterface
{


    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW=>['getDatePub', EventPriorities::PRE_WRITE]
        ];
    }
    public function getDatePub(GetResponseForControllerResultEvent $evt){
        $entity=$evt->getControllerResult();
        $method=$evt->getRequest()->getMethod();


        if(!$entity instanceof PublishedDateInterface||Request::METHOD_POST !==$method){
            return;
        }
        $entity->setPublishedDate(new \DateTime('now'));

    }
}