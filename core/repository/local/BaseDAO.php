<?php

interface BaseDAO {
	
	public function findOne($input);

	public function find($input);

	public function save($input);

	public function update($input);

	public function delete($input);

}