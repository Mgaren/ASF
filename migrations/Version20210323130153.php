<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323130153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carousel_partenaire (id INT AUTO_INCREMENT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, image4 VARCHAR(255) DEFAULT NULL, image5 VARCHAR(255) DEFAULT NULL, image6 VARCHAR(255) DEFAULT NULL, image7 VARCHAR(255) DEFAULT NULL, image8 VARCHAR(255) DEFAULT NULL, image9 VARCHAR(255) DEFAULT NULL, image10 VARCHAR(255) DEFAULT NULL, image11 VARCHAR(255) DEFAULT NULL, image12 VARCHAR(255) DEFAULT NULL, image13 VARCHAR(255) DEFAULT NULL, image14 VARCHAR(255) DEFAULT NULL, image15 VARCHAR(255) DEFAULT NULL, image16 VARCHAR(255) DEFAULT NULL, image17 VARCHAR(255) DEFAULT NULL, image18 VARCHAR(255) DEFAULT NULL, image19 VARCHAR(255) DEFAULT NULL, image20 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carousel_section (id INT AUTO_INCREMENT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, image4 VARCHAR(255) DEFAULT NULL, image5 VARCHAR(255) DEFAULT NULL, image6 VARCHAR(255) DEFAULT NULL, image7 VARCHAR(255) DEFAULT NULL, image8 VARCHAR(255) DEFAULT NULL, image9 VARCHAR(255) DEFAULT NULL, image10 VARCHAR(255) DEFAULT NULL, image11 VARCHAR(255) DEFAULT NULL, image12 VARCHAR(255) DEFAULT NULL, image13 VARCHAR(255) DEFAULT NULL, image14 VARCHAR(255) DEFAULT NULL, image15 VARCHAR(255) DEFAULT NULL, image16 VARCHAR(255) DEFAULT NULL, image17 VARCHAR(255) DEFAULT NULL, image18 VARCHAR(255) DEFAULT NULL, image19 VARCHAR(255) DEFAULT NULL, image20 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE carousel_partenaire');
        $this->addSql('DROP TABLE carousel_section');
    }
}
