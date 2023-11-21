<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121092612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_user (product_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7BF4E84584665A (product_id), INDEX IDX_7BF4E8A76ED395 (user_id), PRIMARY KEY(product_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_product_inventory (product_id INT NOT NULL, product_inventory_id INT NOT NULL, INDEX IDX_6B08CEE84584665A (product_id), INDEX IDX_6B08CEE8844A8532 (product_inventory_id), PRIMARY KEY(product_id, product_inventory_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_product_category (product_id INT NOT NULL, product_category_id INT NOT NULL, INDEX IDX_437017AA4584665A (product_id), INDEX IDX_437017AABE6903FD (product_category_id), PRIMARY KEY(product_id, product_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_discount (product_id INT NOT NULL, discount_id INT NOT NULL, INDEX IDX_2A50DE994584665A (product_id), INDEX IDX_2A50DE994C7C611F (discount_id), PRIMARY KEY(product_id, discount_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_user ADD CONSTRAINT FK_7BF4E84584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_user ADD CONSTRAINT FK_7BF4E8A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_product_inventory ADD CONSTRAINT FK_6B08CEE84584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_product_inventory ADD CONSTRAINT FK_6B08CEE8844A8532 FOREIGN KEY (product_inventory_id) REFERENCES product_inventory (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_product_category ADD CONSTRAINT FK_437017AA4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_product_category ADD CONSTRAINT FK_437017AABE6903FD FOREIGN KEY (product_category_id) REFERENCES product_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_discount ADD CONSTRAINT FK_2A50DE994584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_discount ADD CONSTRAINT FK_2A50DE994C7C611F FOREIGN KEY (discount_id) REFERENCES discount (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA76ED395');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395 ON product');
        $this->addSql('ALTER TABLE product DROP user_id, DROP category_id, DROP inventory_id, DROP discount_id');
        $this->addSql('ALTER TABLE user ADD user_adress_id INT DEFAULT NULL, ADD user_info_id INT DEFAULT NULL, ADD user_payment_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64984667448 FOREIGN KEY (user_adress_id) REFERENCES useradress (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649586DFF2 FOREIGN KEY (user_info_id) REFERENCES user_info (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A3A46557 FOREIGN KEY (user_payment_id) REFERENCES user_payment (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64984667448 ON user (user_adress_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649586DFF2 ON user (user_info_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A3A46557 ON user (user_payment_id)');
        $this->addSql('ALTER TABLE user_info DROP user');
        $this->addSql('ALTER TABLE user_payment DROP user_id');
        $this->addSql('ALTER TABLE useradress DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_user DROP FOREIGN KEY FK_7BF4E84584665A');
        $this->addSql('ALTER TABLE product_user DROP FOREIGN KEY FK_7BF4E8A76ED395');
        $this->addSql('ALTER TABLE product_product_inventory DROP FOREIGN KEY FK_6B08CEE84584665A');
        $this->addSql('ALTER TABLE product_product_inventory DROP FOREIGN KEY FK_6B08CEE8844A8532');
        $this->addSql('ALTER TABLE product_product_category DROP FOREIGN KEY FK_437017AA4584665A');
        $this->addSql('ALTER TABLE product_product_category DROP FOREIGN KEY FK_437017AABE6903FD');
        $this->addSql('ALTER TABLE product_discount DROP FOREIGN KEY FK_2A50DE994584665A');
        $this->addSql('ALTER TABLE product_discount DROP FOREIGN KEY FK_2A50DE994C7C611F');
        $this->addSql('DROP TABLE product_user');
        $this->addSql('DROP TABLE product_product_inventory');
        $this->addSql('DROP TABLE product_product_category');
        $this->addSql('DROP TABLE product_discount');
        $this->addSql('ALTER TABLE product ADD user_id INT NOT NULL, ADD category_id INT NOT NULL, ADD inventory_id INT NOT NULL, ADD discount_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64984667448');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649586DFF2');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649A3A46557');
        $this->addSql('DROP INDEX IDX_8D93D64984667448 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D649586DFF2 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D649A3A46557 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP user_adress_id, DROP user_info_id, DROP user_payment_id, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE useradress ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_info ADD user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user_payment ADD user_id INT NOT NULL');
    }
}
