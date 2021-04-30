<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422145921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basketball_planning_basketball_category DROP FOREIGN KEY FK_1578996CCDADD707');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category DROP FOREIGN KEY FK_1578996CE26D19F4');
        $this->addSql('CREATE TABLE section_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_planning (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, time VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, cotisation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_planning_section_category (section_planning_id INT NOT NULL, section_category_id INT NOT NULL, INDEX IDX_1CB49A992B772C6E (section_planning_id), INDEX IDX_1CB49A994B7E29D (section_category_id), PRIMARY KEY(section_planning_id, section_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE section_planning_section_category ADD CONSTRAINT FK_1CB49A992B772C6E FOREIGN KEY (section_planning_id) REFERENCES section_planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_planning_section_category ADD CONSTRAINT FK_1CB49A994B7E29D FOREIGN KEY (section_category_id) REFERENCES section_category (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE basketball_category');
        $this->addSql('DROP TABLE basketball_planning');
        $this->addSql('DROP TABLE basketball_planning_basketball_category');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_planning_section_category DROP FOREIGN KEY FK_1CB49A994B7E29D');
        $this->addSql('ALTER TABLE section_planning_section_category DROP FOREIGN KEY FK_1CB49A992B772C6E');
        $this->addSql('CREATE TABLE basketball_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE basketball_planning (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, time VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lieu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cotisation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE basketball_planning_basketball_category (basketball_planning_id INT NOT NULL, basketball_category_id INT NOT NULL, INDEX IDX_1578996CCDADD707 (basketball_category_id), INDEX IDX_1578996CE26D19F4 (basketball_planning_id), PRIMARY KEY(basketball_planning_id, basketball_category_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category ADD CONSTRAINT FK_1578996CCDADD707 FOREIGN KEY (basketball_category_id) REFERENCES basketball_category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category ADD CONSTRAINT FK_1578996CE26D19F4 FOREIGN KEY (basketball_planning_id) REFERENCES basketball_planning (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE section_category');
        $this->addSql('DROP TABLE section_planning');
        $this->addSql('DROP TABLE section_planning_section_category');
    }
}
