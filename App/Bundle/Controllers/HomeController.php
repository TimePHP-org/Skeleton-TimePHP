<?php

namespace TimePHP\Bundle\Controllers;

use TimePHP\Foundation\Controller; 
use PDO;

/**
 * Controller de la page d'accueil
 * 
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 * @link http://domaine.com
 */
class HomeController extends Controller
{

    /**
     * Récupère l'ensemble des utilisateurs
     * 
     * @see http://domaine.com/
     */
    public function getUsers()
    {
        $result = $this->client->query("SELECT * FROM User");
        echo $this->twig->render("home.twig", [
            "users" => $result
        ]);
    }

    /**
     * Récupère l'ensemble des articles d'un utilisateur
     * 
     * @param int $idUser ID de l'utilisateur selectionné
     * @see http://domaine.com/user/[int:idUser]
     */
    public function getArticleByUser(int $idUser)
    {
        $result = $this->client->prepare("SELECT * FROM Article WHERE id_User =  ?");
        $result->bindValue(1, $idUser, PDO::PARAM_INT);
        $result->execute();
        echo $this->twig->render("articles.twig", [
            "articles" => $result
        ]);
    }


    /**
     * Récupère l'intégralité d'un article
     * 
     * @param int $idArticle Correspond à l'id de l'article sur lequel on a cliqué
     * @param string $slug Designe le slug de l'article
     * @see http://domaine.com/article/[int:idArticle]/[string:slug]
     */
    public function getFullArticle(int $idArticle, string $slug)
    {
        $result = $this->client->prepare("SELECT * FROM Article WHERE id =  ?");
        $result->bindValue(1, $idArticle, PDO::PARAM_INT);
        $result->execute();
        echo $this->twig->render("articleFull.twig", [
            "article" => $result->fetch()
        ]);
    }
}