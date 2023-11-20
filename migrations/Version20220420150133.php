<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420150133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shared_map (id INT AUTO_INCREMENT NOT NULL, map_id INT DEFAULT NULL, sender VARCHAR(255) NOT NULL, reciever_email VARCHAR(255) NOT NULL, read_only TINYINT(1) NOT NULL, map_label VARCHAR(255) NOT NULL, INDEX IDX_B5F0374F53C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shared_map ADD CONSTRAINT FK_B5F0374F53C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE shared_map');
    }
}
