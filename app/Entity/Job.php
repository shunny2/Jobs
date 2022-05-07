<?php

namespace App\Entity;

use App\Database\Database;
use PDO;

class Job 
{
    /**
     * Unique indentifier job.
     * @var integer
     */
    public $id;

    /**
     * Job title.
     * @var string
     */
    public $title;

    /**
     * Job description.
     * @var text
     */
    public $description;

    /**
     * Defines if the vacancy is active.
     * @var string(s/n)
     */
    public $active;

    /**
     * Job posting data.
     * @var string
     */
    public $date;

    /**
     * Method responsible for registering vacancies in database.
     * @return boolean
     */
    public function register()
    {
        $this->date = date('Y-m-d H:i:s');

        $database = new Database('vacancies');
        $this->id = $database->insert([
            'title' => $this->title,
            'description' => $this->description,
            'active' => $this->active,
            'date' => $this->date
        ]);

        return true;
    }

    /**
     * Method responsible for updating vacancies in database.
     * @return boolean
     */
    public function update()
    {
        return (new Database('vacancies'))->update('id = ' .$this->id, [
            'title' => $this->title,
            'description' => $this->description,
            'active' => $this->active,
            'date' => $this->date
        ]);
    }

    /**
     * Method responsible for delete vacancies in database.
     * @return boolean
     */
    public function delete()
    {
        return (new Database('vacancies'))->delete('id = ' .$this->id);
    }

    /**
     * Method responsible for getting vacancies from the database.
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVacancies($where = null, $order = null, $limit = null)
    {
        return (new Database('vacancies'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Method responsible for obtaining the number of vacancies in the database.
     * @param string $where
     * @return integer
     */
    public static function getNumberOfVacancies($where = null)
    {
        return (new Database('vacancies'))->select($where, null, null, 'COUNT(*) as quantities')
            ->fetchObject()
            ->quantities;
    }

    /**
     * Method responsible for searching a job based on id.
     * @param integer $id
     * @return Job
     */
    public static function getVacancy($id)
    {
        return (new Database('vacancies'))->select('id = '.$id)
            ->fetchObject(self::class);
    }
}
