<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190316154829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, birth VARCHAR(255) NOT NULL, eye VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, hair VARCHAR(255) NOT NULL, height VARCHAR(255) NOT NULL, mass VARCHAR(255) NOT NULL, skin VARCHAR(255) NOT NULL, homeworld VARCHAR(255) NOT NULL, films LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', species LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', starship LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', vehicles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', created DATETIME NOT NULL, edited DATETIME NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE person');
    }
}
