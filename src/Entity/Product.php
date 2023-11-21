<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;
use App\Repository\ProductRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Timestampable;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[Vich\Uploadable]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $SKU = null;


    #[ORM\Column]
    private ?int $price = null;

    // #[ORM\Column(length: 255, unique:true)]
    // #[Gedmo\Slug(fields: ['id' ])]
    // private $slug;
    


    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'create')]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'update')]
    private ?\DateTimeImmutable $modified_at = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;

    #[ORM\Column(type: 'integer')]
    private ?int $imageSize = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'product_id')]
    private Collection $user_id;

    #[ORM\ManyToMany(targetEntity: ProductInventory::class, inversedBy: 'product_id')]
    private Collection $inventory_id;

    #[ORM\ManyToMany(targetEntity: ProductCategory::class, inversedBy: 'product_id')]
    private Collection $category_id;

    #[ORM\ManyToMany(targetEntity: Discount::class, inversedBy: 'product_id')]
    private Collection $discount_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->inventory_id = new ArrayCollection();
        $this->category_id = new ArrayCollection();
        $this->discount_id = new ArrayCollection();
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {

            $this->modified_at = new \DateTimeImmutable();

        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    
    /**
     * Get the value of imageName
     */ 

    public function getImageName()
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): void 
    {
        $this->imageName = $imageName;
    }

    public function setImageSize(?int $imageSize): void 
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
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

    public function getSKU(): ?int
    {
        return $this->SKU;
    }

    public function setSKU(int $SKU): static
    {
        $this->SKU = $SKU;

        return $this;
    }


    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeImmutable
    {
        return $this->modified_at;
    }

    public function setModifiedAt(\DateTimeImmutable $modified_at): static
    {
        $this->modified_at = $modified_at;

        return $this;
    }



    // public function addUser(self $user): static
    // {
    //     if (!$this->user->contains($user)) {
    //         $this->user->add($user);
    //         $user->setUser($this);
    //     }

    //     return $this;
    // }

    // public function removeUser(self $user): static
    // {
    //     if ($this->user->removeElement($user)) {
    //         // set the owning side to null (unless already changed)
    //         if ($user->getUser() === $this) {
    //             $user->setUser(null);
    //         }
    //     }

    //     return $this;
    // }



    /**
     * @return Collection<int, self>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(self $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setUser_Id($this);
        }

        return $this;
    }

    public function remove(self $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getUser_Id() === $this) {
                $product->setUser_Id(null);
            }
        }

        return $this;
    }

    public function getProduct(): ?self
    {
        return $this->product;
    }

    public function setProduct(?self $product): static
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): static
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
        }

        return $this;
    }

    public function removeUserId(User $userId): static
    {
        $this->user_id->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection<int, ProductInventory>
     */
    public function getInventoryId(): Collection
    {
        return $this->inventory_id;
    }

    public function addInventoryId(ProductInventory $inventoryId): static
    {
        if (!$this->inventory_id->contains($inventoryId)) {
            $this->inventory_id->add($inventoryId);
        }

        return $this;
    }

    public function removeInventoryId(ProductInventory $inventoryId): static
    {
        $this->inventory_id->removeElement($inventoryId);

        return $this;
    }

    /**
     * @return Collection<int, ProductCategory>
     */
    public function getCategoryId(): Collection
    {
        return $this->category_id;
    }

    public function addCategoryId(ProductCategory $categoryId): static
    {
        if (!$this->category_id->contains($categoryId)) {
            $this->category_id->add($categoryId);
        }

        return $this;
    }

    public function removeCategoryId(ProductCategory $categoryId): static
    {
        $this->category_id->removeElement($categoryId);

        return $this;
    }

    /**
     * @return Collection<int, Discount>
     */
    public function getDiscountId(): Collection
    {
        return $this->discount_id;
    }

    public function addDiscountId(Discount $discountId): static
    {
        if (!$this->discount_id->contains($discountId)) {
            $this->discount_id->add($discountId);
        }

        return $this;
    }

    public function removeDiscountId(Discount $discountId): static
    {
        $this->discount_id->removeElement($discountId);

        return $this;
    }

    



}
