<?php

/*
 * 
 * CREATED BY RK @ 8 Augest, 2013
 * 
 */

class Paginate {

    //Items per page
    private $Per_Page;
    //Links per page
    private $LinkPerPage;
    //Current page which is been displaying
    private $Current_Page;
    //Database name
    private $DatabaseName;
    //Database Password
    private $Password;
    //Database User Name
    private $UserName;
    //Server Name
    private $ServerName;
    //Table name
    private $TableName;
    //Url of the page
    private $URL;
    //Query of the pagination 
    public $Select = "SELECT *";
    //Order By attributes
    private $OrderBy;
    //Group by attribute
    private $GroupBy;
    //Index of the next page
    private $NextPage = 0;
    //Index of the previous page
    private $PreviousPage = 0;
    //HTML TAGS that will surround the pagination
    private $StartingTag = "";
    private $EndingTag = "";
    //HTML TAGS that will surrond the link
    private $StaringLinkTag = "";
    private $EndingLinkTag = "";
    //Id of the next link
    private $NextID;
    //Id of the previous link
    private $PreviousID;
    //Id of the current link
    private $CurrentID;
    //Id of the link
    private $LinkID;
    //ID type (class or id)
    private $IdType = 'id';
    //where clause
    private $Where = "";
    //Start of the limit tag
    private $Start = 0;
    //Url values;
    private $UrlValues = array();

    //Constructor
    function __construct($DatabaseName, $ServerName, $UserName, $Password) {
        //Intializae the 
        $this->DatabaseName = $DatabaseName;
        $this->ServerName = $ServerName;
        $this->UserName = $UserName;
        $this->Password = $Password;
    }

    /*
     * 
     * This Function will Connect databse 
     * This return true if it is successfully connected with database and return false otherwies
     * 
     */

    function ConnectWithDatabase() {

        //Selecting the database
        mysql_select_db($this->DatabaseName);
        //Connecting with the database
        mysql_connect($this->ServerName, $this->UserName, $this->Password);
        //Check if it has connected with Database
        if (mysql_select_db($this->DatabaseName)
                && mysql_connect($this->ServerName, $this->UserName, $this->Password)) {
            //return true if it is connected
            return true;
        }
        //return false otherwise
        else {
            return false;
        }
    }

    //this function will add the url values
    function addUrlValues($Name, $Value) {
        $this->UrlValues[$Name] = $Value;
    }

    //this function will return the url values
    private function getUrlValues() {
        //varriable to store the values
        $values = "?";
        //Variable to store the total number of items
        $Total = count($this->UrlValues);
        //check if there is atleast one value
        if ($Total > 0) {
            foreach ($this->UrlValues as $key => $value) {
                $values.="$key=$value&";
            }
        }
        return $values;
    }

    //intializae the link per page
    function setLinkPerPage($LinkPerPage) {
        $this->LinkPerPage = $LinkPerPage;
    }

    //intializae the table name
    function setFrom($TableName) {
        $this->TableName = $TableName;
    }

    //intializae the index of the page in which the user is currently in
    function setCurrentPage($Current_Page) {
        $this->Current_Page = $Current_Page;
    }

    //Intializae the select atrributes of the page
    //i.e "`id`,`name`"
    function setSelect($SELECT) {
        $this->Select = "SELECT $SELECT";
    }

    //Condition for sql statement
    function setWhere($Where) {
        $this->Where = $Where;
    }

    //Intializae the orer by attribute
    //i.e "`id` DESC"
    function setOrderBy($OrderBy) {
        $this->OrderBy = $OrderBy;
    }

    //Intializae the orer by attribute
    //i.e "`id`"
    function setGroupBy($GroupBy) {
        $this->GroupBy = $GroupBy;
    }

    //Intializae the html tags that will surround the paginatin links
    function setOutterHTML($StartingTag, $EndingTag) {
        $this->StartingTag = $StartingTag;
        $this->EndingTag = $EndingTag;
    }

    //Intialize attribute type of the id(it class or id)
    function setIDType($IdType) {
        $this->IdType = $IdType;
    }

    //Intializae the link tags that will surround the links
    function setLinkHTML($StaringLinkTag, $EndingLinkTag) {
        $this->StaringLinkTag = $StaringLinkTag;
        $this->EndingLinkTag = $EndingLinkTag;
    }

    //intializae the id of next link
    function setNextLinkID($NextID) {
        $this->NextID = $NextID;
    }

    //intializae the id of  previous link
    function setPreviousID($PreviousID) {
        $this->PreviousID = $PreviousID;
    }

    //intializae the id of current link
    function setCurrentID($CurrentID) {
        $this->CurrentID = $CurrentID;
    }

    //iintializae the id of the link
    function setLinkID($LinkID) {
        $this->LinkID = $LinkID;
    }

    //Intializae Url of the page
    function setURL($URL) {
        $this->URL = $URL;
    }

    //intializae item per page
    function setPerPage($Per_page) {
        $this->Per_Page = $Per_page;
    }

    //Return the total number of items
    function getTotalPages() {
        //Query to get the total number of pages
        $Query = $this->Select . " FROM "
                . $this->TableName//Name of the table
                . (!empty($this->Where) ? " WHERE " . $this->Where : "")//Where condition
                . (!empty($this->GroupBy) ? " GROUP BY " . $this->GroupBy : "")//Group By condition
                . (!empty($this->OrderBy) ? " ORDER BY " : ""); //Order By condition
        //Running the Query and storing the result
        $Result = mysql_query($Query) or die(mysql_error());
        //Return the total number of items(the number of rows)
        return ceil(mysql_num_rows($Result) / $this->Per_Page);
    }

    //Get Query
    function getQuery() {
        //calculate the starting position
        $this->Start = ($this->Current_Page - 1) * $this->Per_Page;
        //Return the Query

        return $this->Select . " FROM "
                . $this->TableName//Name of the table
                . (!empty($this->Where) ? " WHERE " . $this->Where : "")//Where condition
                . (!empty($this->GroupBy) ? " GROUP BY " . $this->GroupBy : "")//Group By condition
                . (!empty($this->OrderBy) ? " ORDER BY " : "")//Order By condition
                . " LIMIT $this->Start,$this->Per_Page"; //limit
    }

    //Funtion to Paginate the 
    function paginate() {

        //Last item of the links if links are 1 2 3 then the last is 3
        $LastItem = $this->LinkPerPage;
        //hold all the links
        $Links = "";
        //Find the last link
        while ($this->Current_Page > $LastItem) {
            $LastItem+=$this->LinkPerPage;
        }

        //Calculate the link of previous and the next page
        $this->PreviousPage = $LastItem - $this->LinkPerPage;
        $this->NextPage = $LastItem + 1;

        //Modify the values of previous and next page
        $this->PreviousPage = ($this->PreviousPage < 0) ? 0 : $this->PreviousPage;
        $this->NextPage = ($this->NextPage > $this->getTotalPages()) ? $this->getTotalPages() : $this->NextPage;

        //Check if it has previous pages
        $Links.=($this->PreviousPage != 0) ? "$this->StaringLinkTag<a  $this->IdType='$this->PreviousID' href='$this->URL".$this->getUrlValues()."page=$this->PreviousPage'>PREVIOUS</a>$this->EndingLinkTag" : "";

        //Adding the links
        for ($j = 1, $i = ($this->PreviousPage + 1); $i < $this->NextPage && $j <= $this->LinkPerPage; $i++, $j++) {
            $Links.=$this->StaringLinkTag .
                    (
                    ($this->Current_Page == $i) ?
                            "<a $this->IdType='$this->CurrentID' href='$this->URL".$this->getUrlValues()."page=$i'>$i </a>" :
                            "<a $this->IdType='$this->LinkID' href='$this->URL".$this->getUrlValues()."page=$i'>$i </a>"
                    ) . $this->EndingLinkTag;
        }

        //Check if it has next pages
        $Links.=($LastItem >= $this->getTotalPages()) ?
                (
                ($this->Current_Page == $this->getTotalPages()) ? //Check if the last page is the current page
                        "$this->StaringLinkTag<a $this->IdType='$this->CurrentID' href='$this->URL".$this->getUrlValues()."page=$this->NextPage'>$this->NextPage</a>$this->EndingLinkTag" :
                        "$this->StaringLinkTag<a $this->IdType='$this->LinkID' href='$this->URL".$this->getUrlValues()."page=$this->NextPage'>$this->NextPage</a>$this->EndingLinkTag"
                ) :
                "$this->StaringLinkTag<a $this->IdType='$this->NextID' href='$this->URL".$this->getUrlValues()."page=$this->NextPage'>NEXT</a>$this->EndingLinkTag";

        //print the pagination list if it has more than one page
        echo ( $this->getTotalPages() > 1) ? ($this->StartingTag . $Links . $this->EndingTag) : "";
    }

}

?>
