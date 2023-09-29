<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924002018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE noticia ADD autor_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE noticia ADD CONSTRAINT FK_31205F967170846C FOREIGN KEY (autor_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_31205F967170846C ON noticia (autor_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE noticia DROP FOREIGN KEY FK_31205F967170846C');
        $this->addSql('DROP INDEX IDX_31205F967170846C ON noticia');
        $this->addSql('ALTER TABLE noticia DROP autor_id_id');
    }
}
