<?php
class Cnpj {
    
    public function valid($cnpj) {
        $valid = false;
        if (strlen($cnpj) == 14 && is_numeric($cnpj)) {
            $cnpjAux = "";
            $tamanhoCnpj = strlen($cnpj);
            for ($i = 0; $i < $tamanhoCnpj; $i++) {
                $cnpjAux .= $cnpj[$i];
            }
            $cnpj = $cnpjAux; 
            if ($cnpj != "00000000000000") {
                $numero[1] = intval(substr($cnpj, 1 - 1, 1));
                $numero[2] = intval(substr($cnpj, 2 - 1, 1));
                $numero[3] = intval(substr($cnpj, 3 - 1, 1));
                $numero[4] = intval(substr($cnpj, 4 - 1, 1));
                $numero[5] = intval(substr($cnpj, 5 - 1, 1));
                $numero[6] = intval(substr($cnpj, 6 - 1, 1));
                $numero[7] = intval(substr($cnpj, 7 - 1, 1));
                $numero[8] = intval(substr($cnpj, 8 - 1, 1));
                $numero[9] = intval(substr($cnpj, 9 - 1, 1));
                $numero[10] = intval(substr($cnpj, 10 - 1, 1));
                $numero[11] = intval(substr($cnpj, 11 - 1, 1));
                $numero[12] = intval(substr($cnpj, 12 - 1, 1));
                $numero[13] = intval(substr($cnpj, 13 - 1, 1));
                $numero[14] = intval(substr($cnpj, 14 - 1, 1));
                $soma = $numero[1] * 5 + $numero[2] * 4 + $numero[3] * 3 + $numero[4] * 2 + $numero[5] * 9 + $numero[6] * 8 + $numero[7] * 7 + $numero[8] * 6 + $numero[9] * 5 + $numero[10] * 4 + $numero[11] * 3 + $numero[12] * 2;
                $soma = $soma - (11 * (intval($soma / 11)));
                if ($soma == 0 || $soma == 1) {
                    $resultado1 = 0;
                } else {
                    $resultado1 = 11 - $soma;
                }
                if ($resultado1 == $numero[13]) {
                    $soma = $numero[1] * 6 + $numero[2] * 5 + $numero[3] * 4 + $numero[4] * 3 + $numero[5] * 2 + $numero[6] * 9 + $numero[7] * 8 + $numero[8] * 7 + $numero[9] * 6 + $numero[10] * 5 + $numero[11] * 4 + $numero[12] * 3 + $numero[13] * 2;
                    $soma = $soma - (11 * (intval($soma / 11)));
                    if ($soma == 0 || $soma == 1) {
                        $resultado2 = 0;
                    } else {
                        $resultado2 = 11 - $soma;
                    }
                    if ($resultado2 == $numero[14]) {
                        $valid = true;
                    }
                }
            }
        }
        
        return $valid;
    }
    
}  
?>