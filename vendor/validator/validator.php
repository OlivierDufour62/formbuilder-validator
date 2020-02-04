<?php

class Validator
{
    private $valResult;
    private $errors = [];

/**
 * Undocumented function
 *
 * @param [type] $test
 * @param [type] $condition
 * @return self
 */

    public function testInput($test, $condition): self
    {
        if (strlen($test) < $condition) {
            array_push($this->errors, 'condition non remplie!!');
        }
        return $this;
    }

/**
 * Undocumented function
 *
 * @param [type] $testemail
 * @param [type] $condition
 * @return self
 */

    public function testEmail($testemail, $condition): self
    {
        if (preg_match('/^[a-z]*([.]|\w)[a-z]*\d*[@][a-z]*[.]\w{2,5}/', $testemail) == 0) {
            array_push($this->errors, $condition);
        }
        return $this;
    }

/**
 * Undocumented function
 *
 * @param [type] $testpwd
 * @param [type] $condition
 * @return self
 */

    public function testPwd($testpwd, $condition): self
    {
        if (preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%^&*()+=!?\-';,.\/{}|:<>?~]).{8,20})/", $testpwd) == 0) {
            array_push($this->errors, $condition);
        }
        return $this;
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $testpwd
     * @param [type] $regex
     * @param [type] $condition
     * @return self
     */

    public function testRegex($testpwd, $regex, $condition): self
    {
        if (preg_match($regex, $testpwd) == 0) {
            array_push($this->errors, $condition);
        }
        return $this;
    }


/**
 * Undocumented function
 *
 * @param [type] $testdate
 * @param [type] $condition
 * @param [type] $condition2
 * @return self
 */

    public function testDate($testdate, $condition, $condition2):self
    {
        if (strpos($testdate, '-') !== false) {
            $test_arr = explode("-", $testdate);
            if (strlen($test_arr[0]) > 2 || $test_arr[0] > 31 || strlen($test_arr[1]) > 2 || $test_arr[1] > 12 || strlen($test_arr[1]) > 4) {
                array_push($this->errors, $condition);
            }
        } else {
            array_push($this->errors, $condition2);
        }
        return $this;
    }

/**
 * Undocumented function
 *
 * @param [type] $testurl
 * @param [type] $condition
 * @return self
 */

    public function testUrl($testurl, $condition)
    {
        if (!filter_var($testurl, FILTER_VALIDATE_URL)) {
            array_push($this->errors, $condition);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $testmime
     * @param array $listmime
     * @param [type] $condition
     * @return self
     */

    public function validTypeMime($testmime, array $listmime, $condition) :self
    {
        $x = mime_content_type($_FILES[$testmime]["tmp_name"]);
        foreach ($listmime as $val) {
            if ($val == $x) {
                return $this;
            }
        }
        array_push($this->errors, $condition);
        return $this;
    }

/**
 * Undocumented function
 *
 * @return boolean
 */

    public function isValid()
    {
        foreach ($this->errors as $value) {
            echo '<div class="w-25 bg-danger mx-auto m-3 p-0">';
            echo '<div class="text-center"><p class="m-0 text-white">' . $value . '</p></div>';
            echo '</div>';
        }
    }
}
