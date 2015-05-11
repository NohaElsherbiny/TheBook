<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TaskRepository")
 */
class Task
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
    *@var string
    * @ORM\Column(name="task",type="string")
    */
    public $task;
    /**
    * @var string
    * @ORM\Column(name="dueDate",type="datetime")
    */
    public $dueDate;
    
    public function getTask()
    {
        return $this->task;
    }
    public function setTask($task)
    {
        $this->task = $task;
    }
    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    /**
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="tasks",cascade={"persist"})
    * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
    * @Assert\Type(type="AppBundle\Entity\Category")
    * @Assert\Valid()
    */
    protected $category;
    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;
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
}
