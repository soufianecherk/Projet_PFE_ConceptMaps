<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419182007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shared_maps MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX id ON shared_maps');
        $this->addSql('ALTER TABLE shared_maps DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE shared_maps DROP id, CHANGE sender sender VARCHAR(255) NOT NULL, CHANGE read_only read_only TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE shared_maps ADD PRIMARY KEY (id_map_id, id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shared_maps ADD id INT AUTO_INCREMENT NOT NULL, CHANGE sender sender VARCHAR(255) DEFAULT NULL, CHANGE read_only read_only TINYINT(1) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX id ON shared_maps (id)');
    }
}
