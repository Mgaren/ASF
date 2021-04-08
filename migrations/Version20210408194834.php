<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408194834 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, date_id INT NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_27BA704BB897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertical_history (id INT AUTO_INCREMENT NOT NULL, date_id INT NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_AED6FE3BB897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE vertical_history ADD CONSTRAINT FK_AED6FE3BB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE vertical_history');
    }
}
