<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311182632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_IDCONTACT_CONTACT');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_IDUSER_CONTACT');
        $this->addSql('DROP INDEX FK_IDCONTACT_CONTACT ON contact');
        $this->addSql('DROP INDEX IDX_4C62E638FE6E88D7 ON contact');
        $this->addSql('DROP INDEX `primary` ON contact');
        $this->addSql('ALTER TABLE contact ADD id_user INT NOT NULL, ADD id_contact INT NOT NULL, DROP idUser, DROP idContact');
        $this->addSql('ALTER TABLE contact ADD PRIMARY KEY (id_user, id_contact)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `PRIMARY` ON contact');
        $this->addSql('ALTER TABLE contact ADD idUser INT NOT NULL, ADD idContact INT NOT NULL, DROP id_user, DROP id_contact');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_IDCONTACT_CONTACT FOREIGN KEY (idContact) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_IDUSER_CONTACT FOREIGN KEY (idUser) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX FK_IDCONTACT_CONTACT ON contact (idContact)');
        $this->addSql('CREATE INDEX IDX_4C62E638FE6E88D7 ON contact (idUser)');
        $this->addSql('ALTER TABLE contact ADD PRIMARY KEY (idUser, idContact)');
    }
}
