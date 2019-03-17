<?php

namespace App\Services;

use App\Entity\Person;
use Doctrine\Common\Persistence\ObjectManager;

class SwapiService
{
    private const MAX_NUMBER_OF_RECORDS_TO_IMPORT = 89;

    /**
     * @param int $numberOfRecords
     * @param ObjectManager $objectManager
     * @throws \Exception
     */
    public function importRecords(int $numberOfRecords, ObjectManager $objectManager)
    {
        if ($numberOfRecords > 0 && $numberOfRecords < self::MAX_NUMBER_OF_RECORDS_TO_IMPORT) {
            $currentRecordToImport = 1;
            while ($numberOfRecords >= $currentRecordToImport) {
                $record = $this->takeRecords($currentRecordToImport);
                if ($record) {
                    $objectManager->persist($record);
                }
                $currentRecordToImport++;
            }
            $objectManager->flush();
        }
    }

    /**
     * Take people from swapi.com
     *
     * @param $numberOfRecord
     * @return Person
     * @throws \Exception
     */
    private function takeRecords($numberOfRecord)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://swapi.co/api/people/' . $numberOfRecord . '/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = (array)json_decode(curl_exec($curl));
        if (array_key_exists('detail', $result)) {
            return null;
        }
        return new Person($result);
    }
}
