<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

class AppModel extends Model {

    public function sqlDate($userDate) {
        $date = $userDate;   
        if (strlen($userDate) == 10) {
            $year = substr($userDate, 6, 4);
            $month = substr($userDate, 3, 2);
            $day = substr($userDate, 0, 2);
            $date = $year . '-' . $month . '-' . $day;
        }
     
        return $date;
    }
    public function userDate($sqlDate) {
        $date = $sqlDate;   
        if (strlen($sqlDate) == 10) {
            $year = substr($sqlDate, 0, 4);
            $month = substr($sqlDate, 5, 2);
            $day = substr($sqlDate, 8, 2);
            $date =  $day . '/' . $month . '/' . $year;
        }
        
        return $date;
    }
    public function validSqlDate($sqlDate) {
        return $this->validUserDate($this->userDate($sqlDate));
    }
    public function validUserDate($userDate) {
        $valid = false;
        if (strlen($userDate) == 10) {
            $year = substr($userDate, 6, 4);
            $month = substr($userDate, 3, 2);
            $day = substr($userDate, 0, 2);
            if (is_numeric($year) && is_numeric($month) && is_numeric($day)) {
                $valid = $userDate == "  /  /    " || checkdate($month, $day, $year);
            }
        } 
         
        return $valid;
    }

    public function isCpf($check) {
        $isCpf = false;
        $cpf = array_values($check);
        if (count($cpf) > 0) {
            $isCpf = $this->validCpf($cpf[0]);             
        }
        
        return $isCpf;
    }
    
    public function validCpf($numberCpf) {
        App::uses('Cpf', 'Vendor/Cpf');
        $cpf = new Cpf();
        
        return $cpf->valid($numberCpf);
    }

    public function isCnpj($check) {
        $isCnpj = false;
        $cnpj = array_values($check);
        if (count($cnpj) > 0) {
            $isCnpj = $this->validCnpj($cnpj[0]);
        }
        
        return $isCnpj;
    }
    
    public function validCnpj($numberCnpj) {
        App::uses('Cnpj', 'Vendor/Cnpj');
        $cnpj = new Cnpj();
        
        return $cnpj->valid($numberCnpj);
    }


}
