<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
/**
 * @Vich\Uploadable
 */
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("formation_view")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["learning_category", "formation_view"])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("formation_view")]
    private $public;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("formation_view")]
    private $duration;

    #[ORM\Column(type: 'text')]
    #[Groups("formation_view")]
    private $prerequisite;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups("formation_view")]
    private $participants;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $satisfaction;

    #[ORM\Column(type: 'float', nullable: true)]
    private $successRate;

    #[ORM\Column(type: 'text')]
    #[Groups("formation_view")]
    private $goal;

    #[ORM\Column(type: 'text', nullable: true)]
    private $method;

    #[ORM\Column(type: 'text')]
    #[Groups("formation_view")]
    private $validation;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="files", fileNameProperty="file")
     * 
     * @var File|null
     */
    private $uploadedFile;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $file;

    #[ORM\ManyToMany(targetEntity: LearningCategory::class, inversedBy: 'formations', cascade: ["persist"])]
    private $learningCategories;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $moreInfo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $handicap;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $intervenants;

    #[ORM\Column(type: 'text')]
    private $competences;

    #[ORM\Column(type: 'text')]
    private $program;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["learning_category", "formation_view"])]
    private $slug;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups("formation_view")]

    private $updatedAt;

    #[ORM\Column(type: 'boolean')]
    private $enabled;

    #[ORM\Column(type: 'boolean')]
    private $certification;

    #[ORM\Column(type: 'boolean')]
    private $cpf;

    #[ORM\Column(type: 'text')]
    private $organization;

    public function __construct()
    {
        $this->learningCategories = new ArrayCollection();
    }

    public function setUploadedFile(?File $uploadedFile = null): void
    {
        $this->uploadedFile = $uploadedFile;
        // if (null !== $uploadedFile) {
        //     // It is required that at least one field changes if you are using doctrine
        //     // otherwise the event listeners won't be called and the file is lost
        //     $this->setUpdatedAt(new \DateTimeImmutable());
        // }
    }

    public function getUploadedFile(): ?File
    {
        return $this->uploadedFile;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->public;
    }

    public function setPublic(string $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrerequisite(): ?string
    {
        return $this->prerequisite;
    }

    public function setPrerequisite(string $prerequisite): self
    {
        $this->prerequisite = $prerequisite;

        return $this;
    }

    public function getParticipants(): ?int
    {
        return $this->participants;
    }

    public function setParticipants(?int $participants): self
    {
        $this->participants = $participants;

        return $this;
    }

    public function getSatisfaction(): ?int
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(?int $satisfaction): self
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

    public function getSuccessRate(): ?float
    {
        return $this->successRate;
    }

    public function setSuccessRate(?float $successRate): self
    {
        $this->successRate = $successRate;

        return $this;
    }

    public function getGoal(): ?string
    {
        return $this->goal;
    }

    public function setGoal(string $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getValidation(): ?string
    {
        return $this->validation;
    }

    public function setValidation(string $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return Collection<int, LearningCategory>
     */
    public function getLearningCategories(): Collection
    {
        return $this->learningCategories;
    }

    public function addLearningCategory(LearningCategory $learningCategory): self
    {
        if (!$this->learningCategories->contains($learningCategory)) {
            $this->learningCategories[] = $learningCategory;
        }

        return $this;
    }

    public function removeLearningCategory(LearningCategory $learningCategory): self
    {
        $this->learningCategories->removeElement($learningCategory);

        return $this;
    }

    public function getMoreInfo(): ?string
    {
        return $this->moreInfo;
    }

    public function setMoreInfo(?string $moreInfo): self
    {
        $this->moreInfo = $moreInfo;

        return $this;
    }

    public function getHandicap(): ?string
    {
        return $this->handicap;
    }

    public function setHandicap(?string $handicap): self
    {
        $this->handicap = $handicap;

        return $this;
    }

    public function getIntervenants(): ?string
    {
        return $this->intervenants;
    }

    public function setIntervenants(?string $intervenants): self
    {
        $this->intervenants = $intervenants;

        return $this;
    }

    public function getCompetences(): ?string
    {
        return $this->competences;
    }

    public function setCompetences(string $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function setProgram(string $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function isCertification(): ?bool
    {
        return $this->certification;
    }

    public function setCertification(bool $certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function isCpf(): ?bool
    {
        return $this->cpf;
    }

    public function setCpf(bool $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }
}
