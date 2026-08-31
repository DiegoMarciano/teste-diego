<?php

class Service
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Método para registar novo serviço
     */
    public function registerService(string $description, float $price, int $userId)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO services
            (description, price, commission_user, user_id_user)
            VALUES
            (:description, :price, :commission_user, :user_id_user)"
        );

        $commissionUser = $this->calculateCommission($price);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":commission_user", $commissionUser);
        $stmt->bindParam(":user_id_user", $userId);

        return $stmt->execute();
    }

    public function getServicesByUser(int $userId, string $description = "", string $startDate = "", string $endDate = "")
    {

        $sql = "SELECT
                id_service,
                description,
                price,
                created_at,
                updated_at,
                finished_at,
                commission_user
            FROM services
            WHERE user_id_user = :user_id_user";

        $params = [
            ":user_id_user" => $userId
        ];

        if (!empty($description)) {

            $sql .= " AND description LIKE :description";

            $params[":description"] = "%" . $description . "%";
        }

        if (!empty($startDate)) {

            $sql .= " AND created_at >= :start_date";

            $params[":start_date"] = $startDate . " 00:00:00";
        }

        if (!empty($endDate)) {

            $sql .= " AND created_at <= :end_date";

            $params[":end_date"] = $endDate . " 23:59:59";
        }

        $sql .= " ORDER BY created_at DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para calcular comissão
     */
    public function calculateCommission(float $price)
    {
        // Comissão padrão de 5%
        $comission = 0.05;

        if ($price > 1000) {
            // Comissão de 10% para valores maiores que 1000
            $comission = 0.10;
        }

        if ($price > 10000) {
            // Comissão de 20% para valores maiores que 10000
            $comission = 0.20;
        }

        return $price * $comission;
    }

    /**
     * Método para classificar serviço como finalizado
     */
    public function finishService(int $serviceId, int $userId)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE services
             SET finished_at = CURRENT_TIMESTAMP
             WHERE id_service = :id_service
             AND user_id_user = :user_id_user
             AND finished_at IS NULL"
        );

        $stmt->bindParam(":id_service", $serviceId);
        $stmt->bindParam(":user_id_user", $userId);

        return $stmt->execute();
    }
}
