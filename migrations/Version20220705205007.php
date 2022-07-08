<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705205007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, public VARCHAR(255) NOT NULL, duration VARCHAR(255) NOT NULL, prerequisite LONGTEXT NOT NULL, participants INT DEFAULT NULL, satisfaction INT DEFAULT NULL, success_rate DOUBLE PRECISION DEFAULT NULL, goal LONGTEXT NOT NULL, method LONGTEXT NOT NULL, validation LONGTEXT NOT NULL, file VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_learning_category (formation_id INT NOT NULL, learning_category_id INT NOT NULL, INDEX IDX_88E879C05200282E (formation_id), INDEX IDX_88E879C03097A784 (learning_category_id), PRIMARY KEY(formation_id, learning_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_learning_category ADD CONSTRAINT FK_88E879C05200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_learning_category ADD CONSTRAINT FK_88E879C03097A784 FOREIGN KEY (learning_category_id) REFERENCES learning_category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_learning_category DROP FOREIGN KEY FK_88E879C05200282E');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_learning_category');
    }
}
