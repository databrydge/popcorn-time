<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230210111145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie ADD actors LONGTEXT DEFAULT NULL, ADD content_rating VARCHAR(12) DEFAULT NULL, ADD release_date VARCHAR(255) DEFAULT NULL, ADD production_company VARCHAR(255) DEFAULT NULL, ADD genres VARCHAR(1024) DEFAULT NULL, ADD runtime INT DEFAULT NULL');
        $this->addSql('ALTER TABLE review ADD review_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', ADD score VARCHAR(255) DEFAULT NULL, ADD review_author_company VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE review DROP review_date, DROP score, DROP review_author_company');
        $this->addSql('ALTER TABLE movie DROP actors, DROP content_rating, DROP release_date, DROP production_company, DROP genres, DROP runtime');
    }
}
