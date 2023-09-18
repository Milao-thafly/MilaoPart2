<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230918205441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product CHANGE discount_id discount_id INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE product_id product_id INT NOT NULL, CHANGE slug slug VARCHAR(260) NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product CHANGE discount_id discount_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` CHANGE product_id product_id INT DEFAULT NULL, CHANGE slug slug VARCHAR(260) DEFAULT NULL, CHANGE updated_at updated_at VARCHAR(255) DEFAULT NULL');
    }
}
