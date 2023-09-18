<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MerchController extends AbstractController
{
    #[Route('/merch', name: 'app_merch')]
    public function index(ProductRepository $repoProduct): Response
    {
        $product = $repoProduct->findAll();
        //A faire vérifier que je récupère ce que je veux avec le var
        var_dump($product);

        return $this->render('merch/merch.html.twig', [
            // 'controller_name' => 'MerchController',
            'product' => $product,
        ]);
    }

    #[Route('/merch/create', name: 'home_createProduct')]
    #[IsGranted('ROLE_ADMIN')]
    public function createArticle(Request $request, EntityManagerInterface $em,)
    {
        setlocale(LC_TIME,['fr', 'fra', 'fr_FR']);
        date_default_timezone_set('Europe/Paris');

        
        $product = new Product();

        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form-> isSubmitted() && $form->isValid()) {
            // $idUser = $this -> getUser() -> getId();
            // $product -> setIdAuthor($idUser);

            $em->persist($product);
            $em->flush();
            // $this->addFlash('success', 'Article créé avec succès');
            // return $this->redirectToRoute('home_index');
        }

        return $this->render('merch/merchCreate.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/merch/edit/{id}', name: 'home_editProduct', methods: 'GET|POST')]
    #[IsGranted('ROLE_ADMIN')]
    public function editProduct(Product $product, Request $request, ProductRepository $repoProduct, EntityManagerInterface $em, int $id)
    {
        $currentUser = $this->getUser() -> getId();

        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($product);
            $em->flush();
        }

        return $this->render('edit/merchEdit.html.twig', [
            'productForm' => $form->createView(),
            'id' => $id
        ]);
    }

    #[Route('/merch/delete/{id}', name: 'home_deleteProduct', methods: 'POST')]
    #[IsGranted('ROLE_ADMIN')]
    public function deleteProduct(Product $product, ProductRepository $repoProduct, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->get('_token'))) {
            $repoProduct->remove($product,true);
            $this->addFlash('success', 'Product supprimé avec succès');

            return $this->redirectToRoute('merch/merch.html.twig');

        }
        $this->addFlash('error', 'Le token n\'est pas valide');

        return $this->redirectToRoute('app_merch');
    }
    #[Route('/merch/read/{id}', name: 'merch_readProduct', methods: 'GET|POST')]
    public function show(ProductRepository $repoProduct, int $id): Response
    {
        $product = $repoProduct->find($product);
        var_dump($product);
        return $this->render('merch/merchRead.html.twig', [
            'product' => $product,
        ]);
    }

    
}
