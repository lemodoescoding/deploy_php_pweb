<?php

declare(strict_types=1);

namespace App\Model;

use App\Core\DB;
use PDO;

class UserProfile
{
  private PDO $db;

  public function __construct()
  {
    $this->db = DB::getInstance();
  }

  public function getByUserId(int $userId): ?array
  {
    $stmt = $this->db->prepare("
            SELECT user_id, bio, last_education, photo, created_at, updated_at
            FROM user_profiles
            WHERE user_id = :uid
            LIMIT 1
        ");

    $stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data ?: null;
  }

  /**
   * Create profile if not exists, otherwise update
   */
  public function updateOrCreate(int $userId, array $data): bool
  {
    $sql = "
            INSERT INTO user_profiles (user_id, bio, last_education, photo)
            VALUES (:uid, :bio, :edu, :pho)
            ON DUPLICATE KEY UPDATE
                bio = VALUES(bio),
                last_education = VALUES(last_education),
                updated_at = CURRENT_TIMESTAMP
        ";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':bio', $data['bio'] ?? null, PDO::PARAM_STR);
    $stmt->bindValue(':edu', $data['last_education'] ?? null, PDO::PARAM_STR);
    $stmt->bindValue(':pho', $data['photo'] ?? null, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function updatePhoto(int $userId, string $path): bool
  {
    $sql = "
            INSERT INTO user_profiles (user_id, photo)
            VALUES (:uid, :photo)
            ON DUPLICATE KEY UPDATE
                photo = VALUES(photo),
                updated_at = CURRENT_TIMESTAMP
        ";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':photo', $path, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function createDefault(int $userId): bool
  {
    $stmt = $this->db->prepare("
        INSERT INTO user_profiles (user_id, bio, last_education, photo)
        VALUES (:uid, NULL, NULL, '')
    ");
    $stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
