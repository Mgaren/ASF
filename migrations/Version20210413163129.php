<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210413163129 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actuality ADD description3 VARCHAR(255) DEFAULT NULL, ADD description4 VARCHAR(255) DEFAULT NULL, ADD description5 VARCHAR(255) DEFAULT NULL, ADD description6 VARCHAR(255) DEFAULT NULL, ADD description7 VARCHAR(255) DEFAULT NULL, ADD description8 VARCHAR(255) DEFAULT NULL, ADD description9 VARCHAR(255) DEFAULT NULL, ADD description10 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actuality DROP description3, DROP description4, DROP description5, DROP description6, DROP description7, DROP description8, DROP description9, DROP description10');
    }
}
