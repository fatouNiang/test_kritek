<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220410140831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice CHANGE invoice_number invoice_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice_line CHANGE amount amount NUMERIC(10, 2) DEFAULT NULL, CHANGE amount_tva amount_tva NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice CHANGE invoice_number invoice_number INT NOT NULL');
        $this->addSql('ALTER TABLE invoice_line CHANGE amount amount NUMERIC(10, 2) NOT NULL, CHANGE amount_tva amount_tva NUMERIC(10, 2) NOT NULL');
    }
}
