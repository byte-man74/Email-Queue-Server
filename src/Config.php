<?php



use Predis\Client as PredisClient;
class RedisConfig
{
    private string $host;
    private int $port;
    private ?PredisClient $client;
    private string $password;
    private int $database;

    public function __construct(
        string $host = 'localhost',
        int $port = 6379,
        string $password = '',
        int $database = 0
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->password = $password;
        $this->database = $database;
        $this->initializeClient();
    }

    private function initializeClient(): void
    {
        try {
            $this->client = new PredisClient([
                'scheme'   => 'tcp',
                'host'     => $this->host,
                'port'     => $this->port,
                'password' => $this->password,
                'database' => $this->database,
            ]);
        } catch (\Exception $e) {
            $this->client = null;
            throw new \RuntimeException('Failed to initialize Redis client: ' . $e->getMessage());
        }
    }

    public function getClient(): ?PredisClient
    {
        return $this->client;
    }

}
