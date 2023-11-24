<?php

declare(strict_types=1);

use App\Auth;
use App\Auth\Entity\User\User;
use App\Auth\Entity\User\UserRepository;
use App\Auth\Service\JoinConfirmationSender;
use App\Frontend\FrontendUrlGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Container\ContainerInterface;

return [
    UserRepository::class => function (ContainerInterface $container): UserRepository {
        /** @var EntityManagerInterface $em */
        $em = $container->get(EntityManagerInterface::class);
        /** @var EntityRepository $repo */
        $repo = $em->getRepository(User::class);
        return new UserRepository($em, $repo);
    },

    JoinConfirmationSender::class => function (ContainerInterface $container): JoinConfirmationSender {
        /** @var Swift_Mailer $mailer */
        $mailer = $container->get(Swift_Mailer::class);
        /** @var FrontendUrlGenerator $frontend */
        $frontend = $container->get(FrontendUrlGenerator::class);

        return new JoinConfirmationSender($mailer, $frontend);
    },
];