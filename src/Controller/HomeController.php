<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Cliente;
use App\Entity\Pedido;
use App\Entity\Producto;

class HomeController extends AbstractController
{
    /**
    * @Route("/home", name="home")
    */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $cliente = new Cliente();
        $cliente->setDni('DNI2');
        $cliente->setNombre('NombreCliente2');
        $cliente->setEmail('email1@email2.com');
        $entityManager->persist($cliente);

        $pedido = new Pedido();
        $pedido->setCliente($cliente);
        $pedido->setReferencia('ReferenciaPedido2');
        $entityManager->persist($pedido);

        $product = new Producto();
        $product->setReferencia('ReferenciaProducto2');
        $product->setNombre('NombreProducto2');
        $product->setPrecio(3123.12);
        $entityManager->persist($product);

        $product2 = new Producto();
        $product2->setReferencia('ReferenciaProducto3');
        $product2->setNombre('NombreProducto3');
        $product2->setPrecio(4123.12);
        $entityManager->persist($product2);

        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HomeController.php',
        ]);
    }
}