<?php

namespace App\Controller;

use App\Document\ReadingSession;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReadingSessionController extends AbstractController
{
    #[Route('/reading-session/test', name: 'reading_session_test')]
    public function test(DocumentManager $dm): Response
    {
        $session = new ReadingSession();
        $session->setPagesLues(60);
        $session->setTempsPasse(5.5);
        $session->setNotesPersonnelle('Bonne session, lecture fluide et agréable.');


        $dm->persist($session);
        $dm->flush();

        return new Response('📚 Reading session enregistrée dans MongoDB !');
    }
}

