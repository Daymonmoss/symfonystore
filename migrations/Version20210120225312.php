<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120225312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE store_cart (id INT AUTO_INCREMENT NOT NULL, store_item_id INT NOT NULL, session_id VARCHAR(255) NOT NULL, count INT NOT NULL, INDEX IDX_E91A2679B6773B9 (store_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_items (id INT AUTO_INCREMENT NOT NULL, price VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_order (id INT AUTO_INCREMENT NOT NULL, session_id VARCHAR(255) NOT NULL, status INT NOT NULL, user_name VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, user_phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store_cart ADD CONSTRAINT FK_E91A2679B6773B9 FOREIGN KEY (store_item_id) REFERENCES store_items (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store_cart DROP FOREIGN KEY FK_E91A2679B6773B9');
        $this->addSql('DROP TABLE store_cart');
        $this->addSql('DROP TABLE store_items');
        $this->addSql('DROP TABLE store_order');
    }
}
