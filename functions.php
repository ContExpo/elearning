<?php
function getDBConnection()
{
  return mysqli_connect("localhost", "root", "", "elearning");
}
function dateToDbFormat($date)
{
  return date_format(date_create($date), "Y-m-d");
}
function dateToRenderFormat($date)
{
  return date_format(date_create($date), "d/m/y");
}
?>