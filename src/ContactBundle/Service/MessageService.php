<?php
/**
 * Created by PhpStorm.
 * User: ibtissamchoukri
 * Date: 18/08/2017
 * Time: 19:44
 */

namespace ContactBundle\Service;

use ContactBundle\Entity\Message;
use DateTime;
use Doctrine\Common\Persistence\ObjectManager;

class MessageService
{
    protected $objectManager;

    /**
     * MessageService constructor.
     * @param ObjectManager $om
     * @internal param MessageRepository $messageRepository
     */
    public function __construct(ObjectManager $om)
    {
        $this->objectManager = $om;
    }

    /**
     * @param Message $message
     */
    public function createMessage(Message $message) : void
    {
        $message->setDateDamande(new DateTime());
        $this->objectManager->persist($message);
        $this->objectManager->flush();
    }

    /**
     * @return array|Message[]
     */
    public function findAllMessage() : array
    {
        return $this->objectManager->getRepository('ContactBundle:Message')->findAll();
    }

    /**
     * @param Message $message
     */
    public function saveMessage(Message $message) : void
    {
        $message->setDateTaitement(null);
        if ($message->getTraite()) {
            $message->setDateTaitement(new DateTime());
        }
        $this->objectManager->flush();
    }

    /**
     * @param Message $message
     */
    public function deleteMessage(Message $message) : void
    {
        $this->objectManager->remove($message);
        $this->objectManager->flush();
    }
}
