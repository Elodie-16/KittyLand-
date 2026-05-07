<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260429105834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSONB NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, CONSTRAINT UNIQ_IDENTIFIER_EMAIL UNIQUE (email), PRIMARY KEY (id))');
        $this->addSql('DROP TABLE IF EXISTS messenger_messages');
        $this->addSql('DROP TABLE IF EXISTS utilisateur');
        $this->addSql('ALTER TABLE achat ADD COLUMN "float" VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE achat DROP COLUMN IF EXISTS dat_achat');
        $this->addSql('ALTER TABLE achat DROP COLUMN IF EXISTS utilisateur');
        $this->addSql('ALTER TABLE achat DROP COLUMN IF EXISTS relation');
        $this->addSql('ALTER TABLE achat ALTER COLUMN total TYPE DOUBLE PRECISION USING total::DOUBLE PRECISION');
        $this->addSql('ALTER TABLE produit ADD COLUMN nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit DROP COLUMN IF EXISTS billet');
        $this->addSql('ALTER TABLE produit DROP COLUMN IF EXISTS img');
        $this->addSql('ALTER TABLE produit DROP COLUMN IF EXISTS avis');
        $this->addSql('ALTER TABLE produit ALTER COLUMN prix TYPE DOUBLE PRECISION USING prix::DOUBLE PRECISION');
        $this->addSql('ALTER TABLE produit ALTER COLUMN photo TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 ON messenger_messages (queue_name, available_at, delivered_at)');
        $this->addSql('CREATE TABLE utilisateur (id SERIAL NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSONB NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, CONSTRAINT UNIQ_IDENTIFIER_PSEUDO UNIQUE (pseudo), PRIMARY KEY (id))');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('ALTER TABLE achat DROP COLUMN "float"');
        $this->addSql('ALTER TABLE achat ADD COLUMN dat_achat TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE achat ADD COLUMN relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE achat ALTER COLUMN total TYPE NUMERIC(10, 2) USING total::NUMERIC(10,2)');
        $this->addSql('ALTER TABLE achat ADD COLUMN utilisateur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit DROP COLUMN nom');
        $this->addSql('ALTER TABLE produit ADD COLUMN img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD COLUMN avis TEXT NOT NULL');
        $this->addSql('ALTER TABLE produit ALTER COLUMN prix TYPE NUMERIC(10, 2) USING prix::NUMERIC(10,2)');
        $this->addSql('ALTER TABLE produit ALTER COLUMN photo TYPE VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD COLUMN billet VARCHAR(255) NOT NULL');
    }
}

