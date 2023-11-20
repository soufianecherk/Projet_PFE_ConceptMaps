<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419180656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shared_maps (id INT AUTO_INCREMENT NOT NULL, id_map_id INT NOT NULL, id_user_id INT NOT NULL, sender VARCHAR(255) NOT NULL, read_only TINYINT(1) NOT NULL, INDEX IDX_FDD8633D75F2EA89 (id_map_id), INDEX IDX_FDD8633D79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shared_maps ADD CONSTRAINT FK_FDD8633D75F2EA89 FOREIGN KEY (id_map_id) REFERENCES maps (id)');
        $this->addSql('ALTER TABLE shared_maps ADD CONSTRAINT FK_FDD8633D79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE shared_maps');
    }
}
