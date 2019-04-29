<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190429102909 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alcohol (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_alcohol (user_id INT NOT NULL, alcohol_id INT NOT NULL, INDEX IDX_CAE4634FA76ED395 (user_id), INDEX IDX_CAE4634F5357D7EE (alcohol_id), PRIMARY KEY(user_id, alcohol_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_box (id INT AUTO_INCREMENT NOT NULL, box_id INT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_E3BF29B1D8177B3F (box_id), INDEX IDX_E3BF29B1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_box_alcohol (user_box_id INT NOT NULL, alcohol_id INT NOT NULL, INDEX IDX_22302AE1BD456002 (user_box_id), INDEX IDX_22302AE15357D7EE (alcohol_id), PRIMARY KEY(user_box_id, alcohol_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(6, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_alcohol ADD CONSTRAINT FK_CAE4634FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_alcohol ADD CONSTRAINT FK_CAE4634F5357D7EE FOREIGN KEY (alcohol_id) REFERENCES alcohol (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_box ADD CONSTRAINT FK_E3BF29B1D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE user_box ADD CONSTRAINT FK_E3BF29B1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_box_alcohol ADD CONSTRAINT FK_22302AE1BD456002 FOREIGN KEY (user_box_id) REFERENCES user_box (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_box_alcohol ADD CONSTRAINT FK_22302AE15357D7EE FOREIGN KEY (alcohol_id) REFERENCES alcohol (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_alcohol DROP FOREIGN KEY FK_CAE4634F5357D7EE');
        $this->addSql('ALTER TABLE user_box_alcohol DROP FOREIGN KEY FK_22302AE15357D7EE');
        $this->addSql('ALTER TABLE user_alcohol DROP FOREIGN KEY FK_CAE4634FA76ED395');
        $this->addSql('ALTER TABLE user_box DROP FOREIGN KEY FK_E3BF29B1A76ED395');
        $this->addSql('ALTER TABLE user_box_alcohol DROP FOREIGN KEY FK_22302AE1BD456002');
        $this->addSql('ALTER TABLE user_box DROP FOREIGN KEY FK_E3BF29B1D8177B3F');
        $this->addSql('DROP TABLE alcohol');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_alcohol');
        $this->addSql('DROP TABLE user_box');
        $this->addSql('DROP TABLE user_box_alcohol');
        $this->addSql('DROP TABLE box');
    }
}
