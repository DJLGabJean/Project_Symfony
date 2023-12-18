<?php

namespace App\Entity;

use App\Repository\ForumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForumRepository::class)]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'forum', targetEntity: Comment::class)]
    private Collection $comments;

    #[ORM\ManyToOne(inversedBy: 'forums')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Videogame $videogame = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'forums')]
    private Collection $tags;

    #[ORM\OneToOne(mappedBy: 'forum', cascade: ['persist', 'remove'])]
    private ?Settings $settings = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->types = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setForum($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getForum() === $this) {
                $comment->setForum(null);
            }
        }

        return $this;
    }

    public function getVideogame(): ?Videogame
    {
        return $this->videogame;
    }

    public function setVideogame(?Videogame $videogame): static
    {
        $this->videogame = $videogame;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->addForum($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeForum($this);
        }

        return $this;
    }

    public function getSettings(): ?Settings
    {
        return $this->settings;
    }

    public function setSettings(Settings $settings): static
    {
        // set the owning side of the relation if necessary
        if ($settings->getForum() !== $this) {
            $settings->setForum($this);
        }

        $this->settings = $settings;

        return $this;
    }
}
