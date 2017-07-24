<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class SidebarController extends Controller
{
    /**
     * @Cache(maxage=10)
     */
    public function listLastUsersAction()
    {
        $users = [
            ['username' => 'Marge'],
            ['username' => 'Maggie'],
            ['username' => 'Homer'],
            ['username' => 'Bart'],
            ['username' => 'Liza'],
        ];

        shuffle($users);

        return $this->render('sidebar/users.html.twig', ['users' => $users]);
    }

    /**
     * @Cache(maxage=5)
     */
    public function listLastGamesAction()
    {
        return $this->render('sidebar/games.html.twig');
    }
}
