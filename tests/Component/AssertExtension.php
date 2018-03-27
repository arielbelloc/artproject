<?php
namespace App\Tests\Component;

/**
 * Class AssertExtension
 * @author  Ariel Belloc <abelloc@qubit.tv>
 * @license Propietary
 * @link    http://qubit.tv
 */
trait AssertExtension
{
    /**
     * @param string $time
     * @return \DateTime
     */
    protected function getDateTime($time = 'NOW')
    {
        return new \DateTime($time);
    }

    /**
     * @param string $time
     * @param string $format
     * @return string
     */
    protected function getDateString($time = 'NOW', $format = 'Y-m-d')
    {
        $now = $this->getDateTime($time);
        return $now->format($format);
    }

    /**
     * Compara que 2 fechas sean igaules.
     * @param \DateTime $orginalDateTime
     * @param \DateTime $compareDateTime
     */
    protected function assertEqualsDates(\DateTime $orginalDateTime, \DateTime $compareDateTime)
    {
        $this->assertEquals($orginalDateTime->format('Y-m-d'), $compareDateTime->format('Y-m-d'));
    }

    /**
     * Compara una fecha contra un modificador de tiempo (ej. "+1 month)
     * @param \DateTime $orginalDateTime
     * @param $time
     */
    protected function assertDate(\DateTime $orginalDateTime, $time)
    {
        $this->assertEqualsDates($orginalDateTime, $this->getDateTime($time));
    }

    /**
     * Compara una fecha contra HOY
     * @param \DateTime $orginalDateTime
     */
    protected function assertNow(\DateTime $orginalDateTime)
    {
        $this->assertDate($orginalDateTime, 'NOW');
    }

    protected function getNow() {
        return new \DateTime();
    }

    protected function getNowString($format = 'Y-m-d') {
        $tempDate = new \DateTime();
        return $tempDate->format($format);
    }
}