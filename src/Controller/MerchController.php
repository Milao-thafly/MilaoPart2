<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\EditFormType;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MerchController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @param ProductRepository $repoProduct will just find all the product in my repository
     *     ProductRepository va juste aller chercher les produits dans le repository.

     * @return Response
     */

    #[Route('/merch', name: 'app_merch')]
    public function index(ProductRepository $repoProduct): Response
    {   
        //Here my var $product are equal to findAll the product in the ProductRepository
        // Ici ma variable $product est équivalent à appeller tout mes produits dans le ProductRepository
        $products = $repoProduct->findAll();


        return $this->render('merch/merch.html.twig', [

            'products' => $products,
        ]);
    }

    #[Route('/merch/create', name: 'home_createProduct')]
    #[IsGranted('ROLE_ADMIN')]
    public function createProduct(Request $request, EntityManagerInterface $em)
    {
        // setlocale(LC_TIME,['fr', 'fra', 'fr_FR']);
        // date_default_timezone_set('Europe/Paris');

        
        $product = new Product();

        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form-> isSubmitted() && $form->isValid()) {
            $idUser = $this -> getUser();
            $product -> setUser_Id($idUser);

            $em->persist($product);
            $em->flush();
            $this->addFlash('success', 'Produit créé avec succès');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('merch/merchCreate.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/merch/edit/{id}', name: 'home_editProduct', methods: 'GET|POST')]
    #[IsGranted('ROLE_ADMIN')]
    public function editProduct(Product $product, Request $request, ProductRepository $repoProduct, EntityManagerInterface $em)
    {
        $currentUserId = $this->getUser() -> getId();

        // if ($currentUser !== $product->getUser_Id()) {
        //     throw $this->createAccessDeniedException();
        //     $this->addFlash('error', 'Vous n/etes pas connecté');
        // }


        $form = $this->createForm(EditFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($product);
            $em->flush();
        }

        return $this->render('merch/merchEdit.html.twig', [
            'form' => $form,
            'id' => $product->getId()
        ]);
    }

    #[Route('/merch/delete/{id}', name: 'home_deleteProduct', methods: 'POST')]
    #[IsGranted('ROLE_ADMIN')]
    public function deleteProduct(Product $product, ProductRepository $repoProduct, Request $request, EntityManagerInterface $em)
    {
        $user= $this->getUser();
        if ($user !== $product->getUser_Id()){
            $this->addFlash('error', 'Vous n/êtes pas connecté');
        }

        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->get('_token'))) {
            $em->remove($product,true);
            $em->flush();

            

            return $this->redirectToRoute('app_merch');

            $this->addFlash('success', 'Product supprimé avec succès');

        }
        $this->addFlash('error', 'Le token n\'est pas valide');

        return $this->redirectToRoute('app_merch');
    }
    #[Route('/merch/read/{id}', name: 'merch_readProduct', methods: 'GET')]
    public function show(ProductRepository $repoProduct, Product $product): Response
    {
        $products = $repoProduct->find($product);
        return $this->render('merch/merchRead.html.twig', [
            'product' => $product,
        ]);
    }

    
}
