<?php

declare(strict_types=1);

namespace voku\helper;

/**
 * PaginatorHelper: PHP Pagination Class
 */
class PaginatorHelper
{
    /**
     * Reduce the $data array, so that only values from one page are showing.
     *
     * @param array $data
     * @param int   $perPage
     * @param int   $page
     *
     * @return array
     */
    public static function reduceData(array $data, int $perPage = 10, int $page = 1): array
    {
        // get pagination
        $paginator = new Paginator($perPage, 'page');
        $paginator->set_total(\count($data))->set_pageIdentifierFromGet($page);
        $minMaxArray = $paginator->get_limit_raw();
        --$minMaxArray[1];

        // get limit via pagination
        $dataFiltered = [];
        $tmpCounterMin = 0;
        $tmpCounterMax = 0;
        foreach ($data as $dataKey => $dataValue) {
            if ($tmpCounterMin >= $minMaxArray[0] || $minMaxArray[0] == 0) {
                ++$tmpCounterMax;
                $dataFiltered[$dataKey] = $dataValue;

                if ($tmpCounterMax >= $minMaxArray[1] + 1) {
                    break;
                }
            }

            ++$tmpCounterMin;
        }

        return $dataFiltered;
    }
}
