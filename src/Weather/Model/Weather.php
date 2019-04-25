<?php

namespace Weather\Model;

class Weather
{
    private $map = [
        1 => 'cloud',
        2 => 'cloud-rain',
        3 => 'sun'
    ];

    private $symbol = [
        'Cloudy' => 'cloud',
        'Scattered Showers' => 'cloud-sun-rain',
        'Breezy' => 'wind',
        'Partly Cloudy' => 'cloud-sun',
        'Mostly Cloudy' => 'smog',
        'Sunny' => 'sun'
    ];

    /**
     * @var integer
     */
    protected $dayTemp;

    /**
     * @var integer
     */
    protected $nightTemp;

    /**
     * @var int
     */
    protected $sky;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @return int
     */
    public function getDayTemp(): int
    {
        return $this->dayTemp;
    }

    /**
     * @param int $dayTemp
     */
    public function setDayTemp(int $dayTemp): void
    {
        $this->dayTemp = $dayTemp;
    }

    /**
     * @return int
     */
    public function getNightTemp(): int
    {
        return $this->nightTemp;
    }

    /**
     * @param int $nightTemp
     */
    public function setNightTemp(int $nightTemp): void
    {
        $this->nightTemp = $nightTemp;
    }

    /**
     * @return int
     */
    public function getSky(): int
    {
        return $this->sky;

        return $this->map[$this->sky];
    }

    /**
     * @param int $sky
     */
    public function setSky(int $sky): void
    {
        $this->sky = $sky;
    }

    /**
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getSkySymbol()
    {
        if(is_null($this->getText())) {
            return $this->map[$this->sky];
        } else {
            return $this->symbol[$this->text];
        }
    }
}
