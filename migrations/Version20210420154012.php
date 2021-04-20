<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420154012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actuality (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, description2 VARCHAR(255) DEFAULT NULL, description3 VARCHAR(255) DEFAULT NULL, description4 VARCHAR(255) DEFAULT NULL, description5 VARCHAR(255) DEFAULT NULL, description6 VARCHAR(255) DEFAULT NULL, description7 VARCHAR(255) DEFAULT NULL, description8 VARCHAR(255) DEFAULT NULL, description9 VARCHAR(255) DEFAULT NULL, description10 VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherant_image (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherant_partenaire (id INT AUTO_INCREMENT NOT NULL, partenaire_category_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_A8A0FBC96309F11 (partenaire_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherant_text (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE basketball_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE basketball_planning (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, time VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, cotisation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE basketball_planning_basketball_category (basketball_planning_id INT NOT NULL, basketball_category_id INT NOT NULL, INDEX IDX_1578996CE26D19F4 (basketball_planning_id), INDEX IDX_1578996CCDADD707 (basketball_category_id), PRIMARY KEY(basketball_planning_id, basketball_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carousel_history (id INT AUTO_INCREMENT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, image4 VARCHAR(255) DEFAULT NULL, image5 VARCHAR(255) DEFAULT NULL, image6 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carousel_partenaire (id INT AUTO_INCREMENT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, image4 VARCHAR(255) DEFAULT NULL, image5 VARCHAR(255) DEFAULT NULL, image6 VARCHAR(255) DEFAULT NULL, image7 VARCHAR(255) DEFAULT NULL, image8 VARCHAR(255) DEFAULT NULL, image9 VARCHAR(255) DEFAULT NULL, image10 VARCHAR(255) DEFAULT NULL, image11 VARCHAR(255) DEFAULT NULL, image12 VARCHAR(255) DEFAULT NULL, image13 VARCHAR(255) DEFAULT NULL, image14 VARCHAR(255) DEFAULT NULL, image15 VARCHAR(255) DEFAULT NULL, image16 VARCHAR(255) DEFAULT NULL, image17 VARCHAR(255) DEFAULT NULL, image18 VARCHAR(255) DEFAULT NULL, image19 VARCHAR(255) DEFAULT NULL, image20 VARCHAR(255) DEFAULT NULL, image21 VARCHAR(255) DEFAULT NULL, image22 VARCHAR(255) DEFAULT NULL, image23 VARCHAR(255) DEFAULT NULL, image24 VARCHAR(255) DEFAULT NULL, image25 VARCHAR(255) DEFAULT NULL, image26 VARCHAR(255) DEFAULT NULL, image27 VARCHAR(255) DEFAULT NULL, image28 VARCHAR(255) DEFAULT NULL, image29 VARCHAR(255) DEFAULT NULL, image30 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carousel_section (id INT AUTO_INCREMENT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, image4 VARCHAR(255) DEFAULT NULL, image5 VARCHAR(255) DEFAULT NULL, image6 VARCHAR(255) DEFAULT NULL, image7 VARCHAR(255) DEFAULT NULL, image8 VARCHAR(255) DEFAULT NULL, image9 VARCHAR(255) DEFAULT NULL, image10 VARCHAR(255) DEFAULT NULL, image11 VARCHAR(255) DEFAULT NULL, image12 VARCHAR(255) DEFAULT NULL, image13 VARCHAR(255) DEFAULT NULL, image14 VARCHAR(255) DEFAULT NULL, image15 VARCHAR(255) DEFAULT NULL, image16 VARCHAR(255) DEFAULT NULL, image17 VARCHAR(255) DEFAULT NULL, image18 VARCHAR(255) DEFAULT NULL, image19 VARCHAR(255) DEFAULT NULL, image20 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_horaire (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, morning_hours VARCHAR(255) NOT NULL, afternoon_hours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dirigeants (id INT AUTO_INCREMENT NOT NULL, dirigeants_post_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_3CB249BFD257F109 (dirigeants_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dirigeants_post (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, date_id INT NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_27BA704BB897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history_date (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_asf (id INT AUTO_INCREMENT NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, image4 VARCHAR(255) DEFAULT NULL, image5 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_section (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, image VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_9853B1B7D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE president (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salaries (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_salaries (section_id INT NOT NULL, salaries_id INT NOT NULL, INDEX IDX_7683E217D823E37A (section_id), INDEX IDX_7683E21771204C38 (salaries_id), PRIMARY KEY(section_id, salaries_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertical_history (id INT AUTO_INCREMENT NOT NULL, date_id INT NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_AED6FE3BB897366B (date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherant_partenaire ADD CONSTRAINT FK_A8A0FBC96309F11 FOREIGN KEY (partenaire_category_id) REFERENCES partenaire_category (id)');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category ADD CONSTRAINT FK_1578996CE26D19F4 FOREIGN KEY (basketball_planning_id) REFERENCES basketball_planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category ADD CONSTRAINT FK_1578996CCDADD707 FOREIGN KEY (basketball_category_id) REFERENCES basketball_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dirigeants ADD CONSTRAINT FK_3CB249BFD257F109 FOREIGN KEY (dirigeants_post_id) REFERENCES dirigeants_post (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BB897366B FOREIGN KEY (date_id) REFERENCES history_date (id)');
        $this->addSql('ALTER TABLE home_section ADD CONSTRAINT FK_9853B1B7D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE section_salaries ADD CONSTRAINT FK_7683E217D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_salaries ADD CONSTRAINT FK_7683E21771204C38 FOREIGN KEY (salaries_id) REFERENCES salaries (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vertical_history ADD CONSTRAINT FK_AED6FE3BB897366B FOREIGN KEY (date_id) REFERENCES history_date (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basketball_planning_basketball_category DROP FOREIGN KEY FK_1578996CCDADD707');
        $this->addSql('ALTER TABLE basketball_planning_basketball_category DROP FOREIGN KEY FK_1578996CE26D19F4');
        $this->addSql('ALTER TABLE dirigeants DROP FOREIGN KEY FK_3CB249BFD257F109');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BB897366B');
        $this->addSql('ALTER TABLE vertical_history DROP FOREIGN KEY FK_AED6FE3BB897366B');
        $this->addSql('ALTER TABLE adherant_partenaire DROP FOREIGN KEY FK_A8A0FBC96309F11');
        $this->addSql('ALTER TABLE section_salaries DROP FOREIGN KEY FK_7683E21771204C38');
        $this->addSql('ALTER TABLE home_section DROP FOREIGN KEY FK_9853B1B7D823E37A');
        $this->addSql('ALTER TABLE section_salaries DROP FOREIGN KEY FK_7683E217D823E37A');
        $this->addSql('DROP TABLE actuality');
        $this->addSql('DROP TABLE adherant_image');
        $this->addSql('DROP TABLE adherant_partenaire');
        $this->addSql('DROP TABLE adherant_text');
        $this->addSql('DROP TABLE basketball_category');
        $this->addSql('DROP TABLE basketball_planning');
        $this->addSql('DROP TABLE basketball_planning_basketball_category');
        $this->addSql('DROP TABLE carousel_history');
        $this->addSql('DROP TABLE carousel_partenaire');
        $this->addSql('DROP TABLE carousel_section');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_horaire');
        $this->addSql('DROP TABLE dirigeants');
        $this->addSql('DROP TABLE dirigeants_post');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE history_date');
        $this->addSql('DROP TABLE home_asf');
        $this->addSql('DROP TABLE home_section');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE partenaire_category');
        $this->addSql('DROP TABLE president');
        $this->addSql('DROP TABLE salaries');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE section_salaries');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vertical_history');
    }
}
