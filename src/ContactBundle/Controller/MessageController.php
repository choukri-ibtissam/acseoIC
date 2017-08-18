<?php

namespace ContactBundle\Controller;

use ContactBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Message controller.
 *
 */
class MessageController extends Controller
{
    /**
     * Lists all message entities.
     *
     * @Route("/admin", name="messages")
     * @Method("GET")
     */
    public function indexAction()
    {

        $messages =  $this->get('message.service')->findAllMessage();

        return $this->render('@Contact/message/index.html.twig', [
            'messages' => $messages,
        ]);
    }

    /**
     * Creates a new message entity.
     *
     * @Route("/", name="message_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm('ContactBundle\Form\MessageType', $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('message.service')->createMessage($message);
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Votre message a bien été envoyé')
            ;
            return $this->redirectToRoute('message_new');
        }

        return $this->render('@Contact/message/new.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a message entity.
     *
     * @Route("/admin/{id}", name="message_show")
     * @Method("GET")
     * @param Message $message
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Message $message)
    {
        $deleteForm = $this->createDeleteForm($message);

        return $this->render('@Contact/message/show.html.twig', [
            'message' => $message,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing message entity.
     *
     * @Route("/admin/{id}/edit", name="message_edit")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Message $message
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Message $message)
    {
        $deleteForm = $this->createDeleteForm($message);
        $editForm = $this->createForm('ContactBundle\Form\MessageEditType', $message);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->get('message.service')->saveMessage($message);

            return $this->redirectToRoute('messages');
        }

        return $this->render('@Contact/message/edit.html.twig', [
            'message' => $message,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a message entity.
     *
     * @Route("/admin/{id}", name="message_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Message $message
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Message $message)
    {
        $form = $this->createDeleteForm($message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('message.service')->deleteMessage($message);
        }

        return $this->redirectToRoute('messages');
    }

    /**
     * Creates a form to delete a message entity.
     *
     * @param Message $message The message entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Message $message)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('message_delete', ['id' => $message->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
