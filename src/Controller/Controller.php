<?php

namespace App\Controller;

use App\Entity\StoreOrder;
use App\Form\OrderFormType;
use App\Repository\StoreCartRepository;
use App\Repository\StoreItemsRepository;
use App\Entity\StoreItems;
use App\Entity\StoreCart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    private SessionInterface $session;

    /**
     * Controller constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->session->start();
    }


    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'Controller',
        ]);
    }

    /**
     * @Route("/list", name="storeList")
     * @param StoreItemsRepository $itemsRepository
     * @return Response
     */
    public function storeList(StoreItemsRepository $itemsRepository): Response
    {
        $items = $itemsRepository->findAll();

        return $this->render('/storeList.html.twig', [
            'controller_name' => 'STORE LIST',
            'items' => $items
        ]);
    }

    /**
     * @Route("/item/{id<\d>}", name="storeItem")
     * @param StoreItems $storeItems
     * @return Response
     */
    public function storeItem(StoreItems $storeItems): Response
    {
        return $this->render('/storeItem.html.twig', [
            'title' => $storeItems->getTitle(),
            'description' => $storeItems->getDescription(),
            'price' => $storeItems->getPrice(),
            'id' => $storeItems->getId()
        ]);
    }


    /**
     * @Route("/cart", name="storeCart")
     * @param StoreCartRepository $storeCart
     * @return Response
     */
    public function storeCart(StoreCartRepository $storeCart): Response
    {
        $session = $this->session->getId();
        $items = $storeCart->findBy(['sessionId' => $session]);
        return $this->render('/storeCart.html.twig', [
            'title' => 'Happy Shopping Basket',
            'controller_name' => 'STORE CART',
            'items' => $items
        ]);
    }

    /**
     * @Route("/cart/add/{id<\d>}", name="storeCartAdd")
     * @param StoreItems $storeItems
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function storeCartAdd(StoreItems $storeItems, EntityManagerInterface $em): Response
    {
        $sessionId = $this->session->getId();
        $storeCart = (new StoreCart())
            ->setStoreItem($storeItems)
            ->setCount(1)
            ->setSessionId($sessionId);

        $em->persist($storeCart);
        $em->flush();

        return $this->redirectToRoute('storeItem', ['id'=> $storeItems->getId()]);

    }


    /**
     * @Route("/checkout", name="storeOrder")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function storeOrder(Request $request, EntityManagerInterface $em): Response
    {
        $storeOrder = new StoreOrder();

        $form = $this->createForm(OrderFormType::class, $storeOrder);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $storeOrder = $form->getData();
           if($storeOrder instanceof StoreOrder) {
               $sessionId = $this->session->getId();
               $storeOrder->setStatus(StoreOrder::STATUS_NEW_ORDER);
               $storeOrder->setSessionId($sessionId);

               $em->persist($storeOrder);
               $em->flush();
               $this->session->migrate();
           }
            return $this->redirectToRoute('index');
        }
        return $this->render('/storeOrder.html.twig', [
            'title' => 'Successfull Checkout',
            'form' => $form->createView()
        ]);
    }
}
