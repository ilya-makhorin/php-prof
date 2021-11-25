<?php

namespace App\Controller;
use App\Entity\Product;
use App\Form\ProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * [Route('/product', name: 'product')]
     */
    public function index(): Response
    {
        $prod = new Product();
        $form = $this ->createForm()->getRepository(ProductFormType::class,$prod);
        $rep = $this ->getDoctrine()->getRepository(Product::class);
        $product = $rep->findALL();
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}

<?php
