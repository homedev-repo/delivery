<?php
class Cpf {
    public function valid($cpf) {
        $valid = false;
        if (strlen($cpf) == 11 && is_numeric($cpf)) {
            $invalids = array(
                "11111111111", "22222222222", "33333333333", "44444444444", "55555555555", 
                "66666666666", "77777777777", "88888888888", "99999999999", "00000000000"
            );
            if (!in_array($cpf, $invalids)) {
                $dvInformado = substr($cpf, 9, 2);
                for ($i = 0; $i <= 8; $i++) {
                    $digito[$i] = substr($cpf, $i, 1);
                }
                $posicao = 10;
                $soma = 0;
                for ($i = 0; $i <= 8; $i++) {
                    $soma = $soma + $digito[$i] * $posicao;
                    $posicao = $posicao - 1;
                }
                $digito[9] = $soma % 11;
                if ($digito[9] < 2) {
                    $digito[9] = 0;
                } else {
                    $digito[9] = 11 - $digito[9];
                }
                $posicao = 11;
                $soma = 0;
                for ($i = 0; $i <= 9; $i++) {
                    $soma = $soma + $digito[$i] * $posicao;
                    $posicao = $posicao - 1;
                }
                $digito[10] = $soma % 11;
                if ($digito[10] < 2) {
                    $digito[10] = 0;
                } else {
                    $digito[10] = 11 - $digito[10];
                }
                $dv = $digito[9] * 10 + $digito[10];
                if ($dv == $dvInformado) {
                    $valid = true;
                }
            }
        }
        return $valid;
    }
    
}  
?>