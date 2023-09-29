<?php

namespace App\Entity;

use App\Repository\ClimaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClimaRepository::class)]
class Clima
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 16)]
    private ?string $weather_name = null;

    #[ORM\Column(length: 32)]
    private ?string $weather_description = null;

    #[ORM\Column]
    private ?float $temperature = null;

    #[ORM\Column]
    private ?float $feels_like = null;

    #[ORM\Column]
    private ?float $pressure = null;

    #[ORM\Column]
    private ?float $humidity = null;

    #[ORM\Column]
    private ?float $wind_speed = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeatherName(): ?string
    {
        return $this->weather_name;
    }

    public function setWeatherName(string $weather_name): static
    {
        $this->weather_name = $weather_name;

        return $this;
    }

    public function getWeatherDescription(): ?string
    {
        return $this->weather_description;
    }

    public function setWeatherDescription(string $weather_description): static
    {
        $this->weather_description = $weather_description;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getFeelsLike(): ?float
    {
        return $this->feels_like;
    }

    public function setFeelsLike(float $feels_like): static
    {
        $this->feels_like = $feels_like;

        return $this;
    }

    public function getPressure(): ?float
    {
        return $this->pressure;
    }

    public function setPressure(float $pressure): static
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getHumidity(): ?float
    {
        return $this->humidity;
    }

    public function setHumidity(float $humidity): static
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->wind_speed;
    }

    public function setWindSpeed(float $wind_speed): static
    {
        $this->wind_speed = $wind_speed;

        return $this;
    }
}
