<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415171705 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basketball_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE basketball_planning (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, day VARCHAR(255) NOT NULL, time VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, INDEX IDX_4B7A9EA312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basketball_planning ADD CONSTRAINT FK_4B7A9EA312469DE2 FOREIGN KEY (category_id) REFERENCES basketball_category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basketball_planning DROP FOREIGN KEY FK_4B7A9EA312469DE2');
        $this->addSql('DROP TABLE basketball_category');
        $this->addSql('DROP TABLE basketball_planning');
    }
}
