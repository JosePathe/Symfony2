<?php

namespace Mmi\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
*
* @ORM\Entity(repositoryClass="Mmi\Bundle\BlogBundle\Repository\ArticleRepository")
* @ORM\Table(name="article")
*/
class Article {

	/**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
	protected $id;

	/**
     * @ORM\Column(type="string", length=100)
     */
	protected $slug;

	/**
     * @ORM\Column(type="string", length=100)
     */
	protected $title;

	/**
     * @ORM\Column(type="text")
     */
	protected $content;

	/**
     * @ORM\Column(type="datetime", name="created_at")
     */
	protected $createdAt;
	
    public function __construct() {

        $this->createdAt = new \DateTime();
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
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        $this->slug = strtolower($title);

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
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
     * @return Article
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
}
