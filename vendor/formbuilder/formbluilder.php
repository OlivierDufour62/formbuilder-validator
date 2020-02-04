<?php
class Formbuilder
{

    private $result;



    public function __construct($method = "", $action = "", $id = "", $class = "")
    {
        $this->result = "<form method='$method' id='$id' class='$class' action='$action' enctype='multipart/form-data'>";
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param [type] $for
     * @param [type] $text
     * @param string $class
     * @return self
     */
    public function label($for, $text, $class = "", $id = ""): self
    {
        $this->result .= "<label for='$for' id='$id' class='$class'>" . $text . "</label>";
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param [type] $name
     * @param string $type
     * @param string $id
     * @param string $class
     * @param string $value
     * @param string $placeholder
     * @return self
     */
    public function input($name, $type = "", $id = "", $class = "", $value = "", $placeholder = "", $size=""): self

    {
        $this->result .= "<input type='$type' name='$name'  id='$id' value='$value' class='$class' placeholder='$placeholder' size='$size'>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param [type] $name
     * @param [type] $text
     * @param string $class
     * @return self
     */
    public function button($name, $text, $class = ""): self

    {
        $this->result .= "<button name='$name' class='$class'>" . $text . "</button>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param [type] $name
     * @param string $id
     * @param string $class
     * @param string $value
     * @return self
     */
    public function inputFile($name, $id = "", $class = "", $value = "", $size=''): self

    {
        $this->result .= "<input type='file' name='$name'  id='$id' value='$value' class='$class' size='$size'>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param [type] $name
     * @param string $id
     * @param string $class
     * @param string $cols
     * @param string $rows
     * @return self
     */
    public function textarea($name, $id = "", $class = "", $cols = "", $rows = ""): self

    {
        $this->result .= "<textarea name='$name' id='$id' class='$class' cols='$cols' rows='$rows'></textarea>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param array $tab
     * @param [type] $name
     * @param string $id
     * @param string $class
     * @return self
     */
    public function select(array $tab, $name, $id = "", $class = ""): self

    {
        $empty = [];
        foreach ($tab as $key => $value) {
            array_push($empty, "<option name='$key'>" . $value . "</option>");
        }
        $this->result .= "<select name='$name' id='$id' class='$class'>" . implode($empty) . "</select>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param string $class
     * @param [type] $text
     * @return self
     */
    public function startFieldset($class = "",$id="" ,$text): self

    {
        $this->result .= "<fieldset class='$class' id='$id'><legend>" . $text . "</legend>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @return self
     */
    public function endFieldset(): self

    {
        $this->result .= "</fieldset>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @param string $class
     * @param string $id
     * @return self
     */
    public function startDiv($class = "", $id = ""): self

    {
        $this->result .= "<div class='$class' id='$id'>";
        return $this;
    }
    /**
     * Undocumented function
     *
     * @return self
     */
    public function endDiv(): self

    {
        $this->result .= '</div>';
        return $this;
    }
    /**
     * function generate
     *
     * @return void
     */
    public function getForm()
    {
        $this->result .= '</form>';
        return $this->result;
    }
}
