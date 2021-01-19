<?php 

function getStudent(){
	return auth()->user()->student;
}

 ?>