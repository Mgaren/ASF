<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419130659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basketball_planning_basketball_category (basketball_planning_id INT NOT NULL, basketball_category_id INT NOT NULL, INDEX IDX_1578996CE26D19F4 (basketball_planning_id), INDEX IDX_1578996CCDADD707 (basketball_category_id), PRIMARY KEY(basketball_planning_id, basketball_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category ADD CONSTRAINT FK_1578996CE26D19F4 FOREIGN KEY (basketball_planning_id) REFERENCES basketball_planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category ADD CONSTRAINT FK_1578996CCDADD707 FOREIGN KEY (basketball_category_id) REFERENCES basketball_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE basketball_planning DROP FOREIGN KEY FK_4B7A9EA3CDADD707');
        $this->addSql('DROP INDEX IDX_4B7A9EA3CDADD707 ON basketball_planning');
        $this->addSql('ALTER TABLE basketball_planning ADD cotisation VARCHAR(255) DEFAULT NULL, DROP basketball_category_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE basketball_planning_basketball_category');
        $this->addSql('ALTER TABLE basketball_planning ADD basketball_category_id INT NOT NULL, DROP cotisation');
        $this->addSql('ALTER TABLE basketball_planning ADD CONSTRAINT FK_4B7A9EA3CDADD707 FOREIGN KEY (basketball_category_id) REFERENCES basketball_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4B7A9EA3CDADD707 ON basketball_planning (basketball_category_id)');
    }
}
