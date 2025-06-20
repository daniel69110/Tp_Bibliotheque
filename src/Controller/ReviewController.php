<?php
namespace App\Controller;

use App\Document\Review;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{
#[Route('/book/{bookId}/reviews', name: 'book_reviews')]
public function listReviews(DocumentManager $dm, string $bookId): Response
{
    $reviews = $dm->getRepository(Review::class)->findBy(['bookId' => $bookId]);

    $notes = array_map(fn($r) => $r->getNote(), $reviews);
    $average = count($notes) ? array_sum($notes) / count($notes) : 0;


return $this->render('review/list.html.twig', [
'reviews' => $reviews,
'average' => $average,
'bookId' => $bookId,
]);
}

#[Route('/book/{bookId}/review/add', name: 'add_review')]
public function addReview(Request $request, DocumentManager $dm, string $bookId): Response
{
if ($request->isMethod('POST')) {
$note = (int) $request->request->get('note');
$commentaire = $request->request->get('commentaire');

$review = new Review();
$review->setBookId($bookId);
$review->setNote($note);
$review->setCommentaire($commentaire);
$review->setDate(new \DateTime());

$dm->persist($review);
$dm->flush();

return $this->redirectToRoute('book_reviews', ['bookId' => $bookId]);
}

return $this->render('review/add.html.twig', ['bookId' => $bookId]);
}
}
