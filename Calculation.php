<?php 

/**
 * OstiumDate 
 * Pustaka format dan perhitungan tanggal untuk Bahasa Indonesia 
 * Pustaka ini awalnya diambil dari project OstiumCMS milih Adnan Zaki, web developer Wolestech
 *
 * @package		Application
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Adnan Zaki
 * @link		https://wolestech.com
 */

require_once 'helper.php';

class Calculation 
{
    /**
     * Fungsi untuk menambah jumlah hari pada tanggal 
     * 
     * @param string $date now | dd-mm-yyyy
     * @param mixed $nums, example: array -> ['d', 'm', 'y'] | int -> 0
     */
    public function add(string $date = 'now', $nums = ''): string
    {
        if(empty($nums))
        {
            return $this->error('empty');
        }
        else 
        {
            if($date === 'now')
            {
                $date = date('Y-m-d');
            }
            else 
            {
                $date = reverse($date, '-', '-');
            }

            // cek tipe data $nums untuk membuat interval
            if(gettype($nums) === 'integer')
            {
                $interval = new DateInterval('P'.(string)$nums.'D');
            }
            elseif(gettype($nums) === 'array')
            {
                if(! array_key_exists('d', $nums))
                {
                    $nums['d'] = 0;
                }

                if(! array_key_exists('m', $nums))
                {
                    $nums['m'] = 0;
                }

                if(! array_key_exists('y', $nums))
                {
                    $nums['y'] = 0;
                }

                $days = (string)$nums['d'];
                $months = (string)$nums['m'];
                $year = (string)$nums['y'];

                // 'P[year]Y[months]M[days]D'
                $interval = new DateInterval('P'.$year.'Y'.$months.'M'.$days.'D');
            }

            $dt = new DateTime($date);
            $dt->add($interval);
            return $dt->format('d-m-Y');
        }
    }    

    protected function error($option, $hint = '')
    {
        $error = [
            'date' => "Invalid date input: <b>" . $hint . "</b>",
            'format' => "Invalid date format: <b>" . $hint . "</b",
            'empty' => 'No value inserted.',
            'failed' => 'Unable to read format.',
        ];

        return $error[$option];
    }
}