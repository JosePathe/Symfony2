<?php

namespace Mmi\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
*
* @ORM\Entity(repositoryClass="Mmi\Bundle\BlogBundle\Repository\CommentRepository")
* @ORM\Table(name="comment")
*/
class Comment {

	/**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
	protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $autor;

	/**
     * @ORM\Column(type="string", length=50)
     */
	protected $content;

	/**
     * @ORM\Column(type="datetime", name="created_at")
     */
	protected $createdAt;

    /**
     * @ORM\Column(type="string", length=50, name="id_article")
     */
    protected $idArticle;

    public function __construct($_id) {

        $this->createdAt = new \DateTime();
        $this->idArticle = $_id;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Comment
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set idArticle
     *
     * @param string $idArticle
     * @return Comment
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return string 
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }
}
