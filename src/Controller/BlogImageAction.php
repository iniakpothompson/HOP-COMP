<?php


namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\BlogPhoto;
use App\Form\BlogPhotoType;
use App\Entity\MediaObject;
use App\Form\HotelImageType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Exception\ValidatorException;

final class BlogImageAction
{
    private $formFactory;
    private $entityManager;
    private $validator;
    public function __construct(FormFactoryInterface $formFactory,EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->formFactory=$formFactory;
        $this->entityManager=$entityManager;
        $this->validator=$validator;
    }

    public function __invoke(Request $request): BlogPhoto
    {
		$mediaObject = new BlogPhoto();
		$form=$this->formFactory->create(BlogPhotoType::class,$mediaObject);
		 $form->handleRequest($request);

       
        if($form->isSubmitted() && $form->isValid()){

			$this->entityManager->persist($mediaObject);
            $this->entityManager->flush();

            $mediaObject->setFile(null);
            
            return $mediaObject;
        }

        throw new ValidatorException(
            $this->validator->validate($mediaObject)
        );

    }
}