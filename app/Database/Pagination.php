<?php

namespace App\Database;

class Pagination
{
    /**
     * Maximum number of records per page.
     * @var integer
     */
    private $limit;

    /**
     * Total amount of database results.
     * @var integer
     */
    private $results;

    /**
     * Number of pages.
     * @var integer
     */
    private $pages;

    /**
     * Current page.
     * @var integer
     */
    private $currentPage;

    /**
     * Class constructor.
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Method responsible for calculating the pagination.
     */
    private function calculate()
    {
        // Calculates total pages
        $this->pages = ($this->results > 0) ? ceil($this->results / $this->limit) : 1;
        // Checks that the current page does not exceed the number of pages
        $this->currentPage = ($this->currentPage <= $this->pages) ? $this->currentPage : $this->pages;
    }

    /**
     * Method responsible for returning the sql limit clause.
     * @return string
     */
    public function getLimit()
    {
        $offSet = ($this->limit * ($this->currentPage - 1));
        return $offSet . ',' . $this->limit;
    }

    /**
     * Method responsible for returning the available page options.
     * @return array
     */
    public function getPages()
    {
        if ($this->pages == 1)
            return [];

        $pages = [];
        for ($i = 1; $i <= $this->pages; $i++) {
            $pages[] = [
                'page' => $i,
                'currentPage' => $i == $this->currentPage
            ];
        }

        return $pages;
    }
}
