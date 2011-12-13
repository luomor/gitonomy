<?php

namespace Gitonomy\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Gitonomy\Bundle\CoreBundle\Repository\RepositoryRepository")
 * @ORM\Table(name="repository",uniqueConstraints={
 *     @ORM\UniqueConstraint(name="repository_unique",columns={"user_id","project_id"})
 * })
 */
class Repository
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gitonomy\Bundle\CoreBundle\Entity\User",inversedBy="repositories")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id",nullable=true)
     */
    protected $owner;

    /**
     * @ORM\ManyToOne(targetEntity="Gitonomy\Bundle\CoreBundle\Entity\Project",inversedBy="repositories")
     * @ORM\JoinColumn(name="project_id",referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\Column(type="string", length=128)
     */
    protected $mainBranch;

    public function __construct()
    {
        $this->mainBranch = 'master';
    }

    public function getIsProjectRepository()
    {
        return null === $this->owner;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner(User $owner)
    {
        $this->owner = $owner;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    public function setMainBranch($mainBranch)
    {
        $this->mainBranch = $mainBranch;
    }

    public function getMainBranch()
    {
        return $this->mainBranch;
    }
}
